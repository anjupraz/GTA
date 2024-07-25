<?php

namespace App\Http\Controllers;

use App\Enums\PostType;
use App\Http\Requests\GalleryEditRequest;
use App\Http\Requests\GalleryRequest;
use App\Model\Blog;
use App\Service\Interfaces\ICategoryService;
use App\Service\Interfaces\IGalleryService;
use App\Service\Interfaces\IPostService;
use App\Util\FunctionUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    public function __construct(ICategoryService $categoryService,IPostService $postService,IGalleryService $galleryService) {
        $this->function=new FunctionUtil();
        $this->categoryService = $categoryService;
        $this->postService=$postService;
        $this->galleryService=$galleryService;
    }

    public function index()
    {
        $galleryList=$this->postService->getByType(PostType::Gallery);
        return view('backend.gallery.index',compact('galleryList'));
    }

    public function show()
    {
        $galleryList=$this->galleryService->getGalleryPagination(20);
        return view('frontend.gallery',compact('galleryList'));
    }

    public function create()
    {
        return view('backend.gallery.create');
    }

    public function store(GalleryRequest $request)
    {
        try{
            $category=$this->categoryService->getByCode("G-001");
            $gallery =new Blog();
            $gallery=$this->function->getObject($gallery,$request);
            $gallery->category_id=$category->id;
            $gallery->created_by=Auth::user()->id;
            $this->galleryService->saveGallery($gallery);
            toastr()->success('Gallery added successfully.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to add gallery.','Failed');
        }
        return redirect()->route('gallery.index');
    }

    public function edit($id)
    {
        try{
            $album=$this->postService->getBlogById($id);
            return view('backend.gallery.edit',compact('album'));
        }
        catch(Exception $e){
            toastr()->error('Gallery not found.','Failed');
            return redirect()->route('gallery.index');
        }
    }

    public function update(GalleryEditRequest $request,$id)
    {
        try{
            $category=$this->categoryService->getByCode("G-001");
            $gallery =new Blog();
            $gallery=$this->function->getObject($gallery,$request);
            $gallery->category_id=$category->id;
            $gallery->created_by=Auth::user()->id;
            $this->galleryService->editGallery($id,$gallery);
            toastr()->success('Gallery updated successfully.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to update gallery.','Failed');
        }
        return redirect()->route('gallery.index');
    }

    public function galleryBySlug($slug){
        try{
            $album=$this->galleryService->getGalleryBySlug($slug);
            if($album == null){
                toastr()->error('Gallery not found.','Failed');
                return redirect()->route('index');
            }
            return view('frontend.gallery-detail',compact('album'));
        }
        catch(Exception $e){
            toastr()->error('Gallery not found.','Failed');
            return redirect()->route('index');
        }
    }
}
