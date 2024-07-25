<?php

namespace App\Http\Controllers;

use App\Enums\PostType;
use App\Enums\ProvinceType;
use App\Http\Requests\BannerEditRequest;
use App\Http\Requests\BannerRequest;
use App\Http\Requests\BlogEditRequest;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\DiscountRequest;
use App\Http\Requests\TourRequest;
use App\Model\Blog;
use App\Model\Gallery;
use App\Model\Post;
use App\Model\Tour;
use App\Repositories\Interfaces\IProvinceRepository;
use App\Service\Interfaces\IBannerService;
use App\Service\Interfaces\ICategoryService;
use App\Service\Interfaces\IGalleryService;
use App\Service\Interfaces\IPostService;
use App\Util\FunctionUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BannerController extends Controller
{

    public function __construct(ICategoryService $categoryService,IPostService $postService,
        IGalleryService $galleryService,IBannerService $bannerService) {
        $this->function=new FunctionUtil();
        $this->categoryService = $categoryService;
        $this->postService=$postService;
        $this->galleryService=$galleryService;
        $this->bannerService=$bannerService;
    }

    public function index(){
        $bannerList=$this->postService->getByType(PostType::Banner);
        return view('backend.banners.index',compact('bannerList'));
    }

    public function create()
    {
        return view('backend.banners.create');
    }

    public function store(BannerRequest $request)
    {
        try{
            $category=$this->categoryService->getByCode("BA-001");
            $banner =new Blog();
            $banner=$this->function->getObject($banner,$request);
            $banner->category_id=$category->id;
            $banner->created_by=Auth::user()->id;
            $this->bannerService->saveBanner($banner);
            toastr()->success('Banner added successfully.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to add banner.','Failed');
        }
        return redirect()->route('banners.index');
    }

    public function edit($id)
    {
        try{
            $banner=$this->postService->getBlogById($id);
            return view('backend.banners.edit',compact('banner'));
        }
        catch(Exception $e){
            toastr()->error('Banner not found.','Failed');
            return redirect()->route('banners.index');
        }
    }

    public function update(BannerEditRequest $request,$id)
    {
        try{
            $category=$this->categoryService->getByCode("BA-001");
            $banner =new Blog();
            $banner=$this->function->getObject($banner,$request);
            $banner->category_id=$category->id;
            $banner->created_by=Auth::user()->id;
            $this->bannerService->editBanner($id,$banner);
            toastr()->success('Banner updated successfully.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to update banner.','Failed');
        }
        return redirect()->route('banners.index');
    }

}
