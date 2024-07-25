<?php

namespace App\Http\Controllers;

use App\Enums\PostType;
use App\Enums\ProvinceType;
use App\Http\Requests\BannerEditRequest;
use App\Http\Requests\BannerRequest;
use App\Http\Requests\BlogEditRequest;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\ImpactRequest;
use App\Http\Requests\ServiceRequest;
use App\Model\Blog;
use App\Model\Gallery;
use App\Model\Post;
use App\Model\Tour;
use App\Service\Interfaces\ICategoryService;
use App\Service\Interfaces\IGalleryService;
use App\Service\Interfaces\IImpactService;
use App\Service\Interfaces\IPostService;
use App\Service\Interfaces\IService;
use App\Util\FunctionUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImpactController extends Controller
{

    public function __construct(ICategoryService $categoryService,IPostService $postService,
        IImpactService $impactService) {
        $this->function=new FunctionUtil();
        $this->categoryService = $categoryService;
        $this->postService=$postService;
        $this->impactService=$impactService;
    }

    public function menu()
    {
        return view('backend.impact.menu');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $impactList=$this->postService->getByType(PostType::Impact);
        return view('backend.impact.index',compact('impactList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryList=$this->categoryService->getByType(PostType::Impact);
        return view('backend.impact.create',compact('categoryList'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImpactRequest $request)
    {
        try{
            $impact =new Blog();
            $impact=$this->function->getObject($impact,$request);
            $impact->created_by=Auth::user()->id;
            $this->impactService->saveImpact($impact);
            toastr()->success('Impact added successfully.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to add impact.','Failed');
        }
        return redirect()->route('impact.index');
    }


    public function edit($id)
    {
        try{
            $impact=$this->postService->getBlogById($id);
            $categoryList=$this->categoryService->getByType(PostType::Impact);
            return view('backend.impact.edit',compact('categoryList','impact'));
        }
        catch(Exception $e){
            toastr()->error('Impact not found.','Failed');
            return redirect()->route('impact.index');
        }
    }

    public function update(BlogEditRequest $request,$id)
    {
        try{
            $impact =new Blog();
            $impact=$this->function->getObject($impact,$request);
            $impact->created_by=Auth::user()->id;
            $this->impactService->editImpact($id,$impact);
            toastr()->success('Impact updated successfully.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to update impact.','Failed');
        }
        return redirect()->route('impact.index');
    }

    public function getImpactCategory($id){
        try{
            $impact=$this->categoryService->getByIdType($id,PostType::Impact);
            if($impact){
                return view('frontend.impact-category',compact('impact'));
            }
            else{
                toastr()->error('Impacts not found.','Failed');
                return redirect()->route('index');
            }
        }
        catch(\Exception $e){
            return redirect()->route('index');
        }
    }

    public function impactBySlug($slug){
        try{
            $impact=$this->impactService->getImpactBySlug($slug);
            if($impact){
                return view('frontend.impact',compact('impact'));
            }
            toastr()->error('Impact not found.','Failed');
            return redirect()->route('index');
        }
        catch(Exception $e){
            toastr()->error('Impact not found.','Failed');
            return redirect()->route('index');
        }
    }

}
