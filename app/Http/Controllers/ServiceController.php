<?php

namespace App\Http\Controllers;

use App\Enums\PostType;
use App\Enums\ProvinceType;
use App\Http\Requests\BannerEditRequest;
use App\Http\Requests\BannerRequest;
use App\Http\Requests\BlogEditRequest;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\ServiceRequest;
use App\Model\Blog;
use App\Model\Gallery;
use App\Model\Post;
use App\Model\Tour;
use App\Service\Interfaces\ICategoryService;
use App\Service\Interfaces\IGalleryService;
use App\Service\Interfaces\IPostService;
use App\Service\Interfaces\IService;
use App\Util\FunctionUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{

    public function __construct(ICategoryService $categoryService,IPostService $postService,
        IService $service) {
        $this->function=new FunctionUtil();
        $this->categoryService = $categoryService;
        $this->postService=$postService;
        $this->service=$service;
    }

    public function menu()
    {
        return view('backend.services.menu');
    }


    public function index()
    {
        $serviceList=$this->postService->getByType(PostType::Service);
        return view('backend.services.index',compact('serviceList'));
    }

    public function create()
    {
        $categoryList=$this->categoryService->getByType(PostType::Service);
        return view('backend.services.create',compact('categoryList'));
    }

    public function store(ServiceRequest $request)
    {
        try{
            $service =new Blog();
            $service=$this->function->getObject($service,$request);
            $service->created_by=Auth::user()->id;
            $this->service->saveService($service);
            toastr()->success('Service added successfully.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to add service.','Failed');
        }
        return redirect()->route('services.index');
    }


    public function edit($id)
    {
        try{
            $service=$this->postService->getBlogById($id);
            $categoryList=$this->categoryService->getByType(PostType::Service);
            return view('backend.services.edit',compact('categoryList','service'));
        }
        catch(Exception $e){
            toastr()->error('Service not found.','Failed');
            return redirect()->route('services.index');
        }
    }

    public function update(BlogEditRequest $request,$id)
    {
        try{
            $service =new Blog();
            $service=$this->function->getObject($service,$request);
            $service->created_by=Auth::user()->id;
            $this->service->editService($id,$service);
            toastr()->success('Service updated successfully.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to update service.','Failed');
        }
        return redirect()->route('services.index');
    }

    public function getServiceCategory($id){
        try{
            $service=$this->categoryService->getByIdType($id,PostType::Service);
            if($service){
                return view('frontend.service-category',compact('service'));
            }
            else{
                toastr()->error('Service not found.','Failed');
                return redirect()->route('index');
            }
        }
        catch(\Exception $e){
            return redirect()->route('index');
        }
    }

    public function serviceBySlug($slug){
        try{
            $service=$this->service->getServiceBySlug($slug);
            if($service){
                return view('frontend.service',compact('service'));
            }
            toastr()->error('Service not found.','Failed');
            return redirect()->route('index');
        }
        catch(Exception $e){
            toastr()->error('Service not found.','Failed');
            return redirect()->route('index');
        }
    }

}
