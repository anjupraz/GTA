<?php

namespace App\Http\Controllers;

use App\Enums\PostType;
use App\Enums\ProvinceType;
use App\Http\Requests\BannerEditRequest;
use App\Http\Requests\BannerRequest;
use App\Http\Requests\BlogEditRequest;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\DiscountRequest;
use App\Http\Requests\NoticeRequest;
use App\Http\Requests\TourRequest;
use App\Model\Blog;
use App\Model\Gallery;
use App\Model\Post;
use App\Model\Tour;
use App\Repositories\Interfaces\IProvinceRepository;
use App\Service\Interfaces\IBannerService;
use App\Service\Interfaces\ICategoryService;
use App\Service\Interfaces\IGalleryService;
use App\Service\Interfaces\INoticeService;
use App\Service\Interfaces\IPostService;
use App\Util\FunctionUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoticeController extends Controller
{

    public function __construct(ICategoryService $categoryService,IPostService $postService,
        IGalleryService $galleryService,INoticeService $noticeService) {
        $this->function=new FunctionUtil();
        $this->categoryService = $categoryService;
        $this->postService=$postService;
        $this->galleryService=$galleryService;
        $this->noticeService=$noticeService;
    }

    public function index(){
        $noticeList=$this->postService->getByType(PostType::Notice);
        return view('backend.notice.index',compact('noticeList'));
    }

    public function create()
    {
        return view('backend.notice.create');
    }

    public function store(NoticeRequest $request)
    {
        try{
            $category=$this->categoryService->getByCode("N-001");
            $notice =new Blog();
            $notice=$this->function->getObject($notice,$request);
            $notice->category_id=$category->id;
            $notice->created_by=Auth::user()->id;
            $this->noticeService->saveNotice($notice);
            toastr()->success('Notice added successfully.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to add notice.','Failed');
        }
        return redirect()->route('notice.index');
    }

    public function edit($id)
    {
        try{
            $notice=$this->postService->getBlogById($id);
            return view('backend.notice.edit',compact('notice'));
        }
        catch(Exception $e){
            toastr()->error('Notice not found.','Failed');
            return redirect()->route('notice.index');
        }
    }

    public function update(BannerEditRequest $request,$id)
    {
        try{
            $category=$this->categoryService->getByCode("N-001");
            $notice =new Blog();
            $notice=$this->function->getObject($notice,$request);
            $notice->category_id=$category->id;
            $notice->created_by=Auth::user()->id;
            $this->noticeService->editNotice($id,$notice);
            toastr()->success('Notice updated successfully.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to update notice.','Failed');
        }
        return redirect()->route('notice.index');
    }

}
