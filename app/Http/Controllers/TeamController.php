<?php

namespace App\Http\Controllers;

use App\Enums\PostType;
use App\Http\Requests\TeamEditRequest;
use App\Http\Requests\TeamRequest;
use App\Model\TeamDetail;
use App\Service\Interfaces\ICategoryService;
use App\Service\Interfaces\IGalleryService;
use App\Service\Interfaces\IPostService;
use App\Service\Interfaces\ITeamService;
use App\Util\FunctionUtil;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function __construct(ICategoryService $categoryService,IPostService $postService,
        IGalleryService $galleryService,ITeamService $teamService) {
        $this->function=new FunctionUtil();
        $this->categoryService = $categoryService;
        $this->postService=$postService;
        $this->galleryService=$galleryService;
        $this->teamService=$teamService;
    }

    public function menu()
    {
        return view('backend.team.menu');
    }

    public function index()
    {
        $blogList=$this->postService->getByType(PostType::Team);
        return view('backend.team.index',compact('blogList'));
    }

    public function create()
    {
        $categoryList=$this->categoryService->getByType(PostType::Team);
        return view('backend.team.create',compact('categoryList'));
    }

    public function store(TeamRequest $request)
    {
        try{
            $team =new TeamDetail();
            $team=$this->function->getObject($team,$request);
            $team->created_by=Auth::user()->id;
            $this->teamService->saveTeam($team);
            toastr()->success('Team member added successfully.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to add team member.','Failed');
        }
        return redirect()->route('team.index');
    }

    public function edit($id)
    {
        try{
            $blog=$this->teamService->getTeamById($id);
            $categoryList=$this->categoryService->getByType(PostType::Team);
            return view('backend.team.edit',compact('categoryList','blog'));
        }
        catch(Exception $e){
            toastr()->error('Team member not found.','Failed');
            return redirect()->route('team.index');
        }
    }

    public function update(TeamEditRequest $request,$id)
    {
        try{
            $team =new TeamDetail();
            $team=$this->function->getObject($team,$request);
            $team->created_by=Auth::user()->id;
            $this->teamService->editTeam($id,$team);
            toastr()->success('Team Member updated successfully.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to update team member.','Failed');
        }
        return redirect()->route('team.index');
    }
}
