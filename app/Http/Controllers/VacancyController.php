<?php

namespace App\Http\Controllers;

use App\Enums\PostType;
use App\Event;
use App\Http\Requests\BlogEditRequest;
use App\Http\Requests\EventEditRequest;
use App\Http\Requests\EventRequest;
use App\Http\Requests\VacancyEditRequest;
use App\Http\Requests\VacancyRequest;
use App\Model\Blog;
use App\Service\Interfaces\ICategoryService;
use App\Service\Interfaces\IEventService;
use App\Service\Interfaces\IGalleryService;
use App\Service\Interfaces\IPostService;
use App\Service\Interfaces\IVacancyService;
use App\Util\FunctionUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacancyController extends Controller
{
    public function __construct(ICategoryService $categoryService,IPostService $postService,
        IVacancyService $vacancyService) {
        $this->function=new FunctionUtil();
        $this->categoryService = $categoryService;
        $this->postService=$postService;
        $this->vacancyService=$vacancyService;
    }

    public function index()
    {
        $vacancyList=$this->postService->getByType(PostType::Vacancy);
        return view('backend.vacancy.index',compact('vacancyList'));
    }

    public function create()
    {
        return view('backend.vacancy.create');
    }

    public function store(VacancyRequest $request)
    {
        try{
            $category=$this->categoryService->getByCode("V-001");
            $vacancy =new Blog();
            $vacancy=$this->function->getObject($vacancy,$request);
            $vacancy->category_id=$category->id;
            $vacancy->created_by=Auth::user()->id;
            $this->vacancyService->saveVacancy($vacancy);
            toastr()->success('Vacancy added successfully.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to add vacancy.','Failed');
        }
        return redirect()->route('vacancy.index');
    }


    public function edit($id)
    {
        try{
            $vacancy=$this->postService->getBlogById($id);
            return view('backend.vacancy.edit',compact('vacancy'));
        }
        catch(Exception $e){
            toastr()->error('Vacancy not found.','Failed');
            return redirect()->route('vacancy.index');
        }
    }

    public function update(VacancyEditRequest $request,$id)
    {
        try{
            $category=$this->categoryService->getByCode("V-001");
            $vacancy =new Blog();
            $vacancy=$this->function->getObject($vacancy,$request);
            $vacancy->category_id=$category->id;
            $vacancy->created_by=Auth::user()->id;
            $this->vacancyService->editVacancy($id,$vacancy);
            toastr()->success('Vacancy updated successfully.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to update vacancy.','Failed');
        }
        return redirect()->route('vacancy.index');
    }
}
