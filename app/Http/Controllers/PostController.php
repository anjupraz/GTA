<?php

namespace App\Http\Controllers;

use App\Enums\PostType;
use App\Enums\ProvinceType;
use App\Http\Requests\BannerEditRequest;
use App\Http\Requests\BannerRequest;
use App\Http\Requests\BlogEditRequest;
use App\Http\Requests\BlogRequest;
use App\Model\Blog;
use App\Model\Gallery;
use App\Model\Post;
use App\Model\Tour;
use App\Service\Interfaces\ICategoryService;
use App\Service\Interfaces\IGalleryService;
use App\Service\Interfaces\IPostService;
use App\Util\FunctionUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function __construct(ICategoryService $categoryService,IPostService $postService,
        IGalleryService $galleryService) {
        $this->function=new FunctionUtil();
        $this->categoryService = $categoryService;
        $this->postService=$postService;
        $this->galleryService=$galleryService;
    }

    public function menu()
    {
        return view('backend.blogs.menu');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogList=$this->postService->getByType(PostType::Blog);
        return view('backend.blogs.index',compact('blogList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryList=$this->categoryService->getByType(PostType::Blog);
        return view('backend.blogs.create',compact('categoryList'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        try{
            $blog =new Blog();
            $blog=$this->function->getObject($blog,$request);
            $blog->created_by=Auth::user()->id;
            $this->postService->saveBlog($blog);
            toastr()->success('Blog added successfully.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to add blog.','Failed');
        }
        return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $blog=$this->postService->getBlogById($id);
            $categoryList=$this->categoryService->getByType(PostType::Blog);
            return view('backend.blogs.edit',compact('categoryList','blog'));
        }
        catch(Exception $e){
            toastr()->error('Blog not found.','Failed');
            return redirect()->route('blogs.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(BlogEditRequest $request,$id)
    {
        try{
            $blog =new Blog();
            $blog=$this->function->getObject($blog,$request);
            $blog->created_by=Auth::user()->id;
            $this->postService->editBlog($id,$blog);
            toastr()->success('Blog updated successfully.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to update blog.','Failed');
        }
        return redirect()->route('blogs.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $this->postService->delete($id);
            toastr()->success('Post deleted successfully.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to delete post.','Failed');
        }
        return redirect()->back();
    }

    public function status($id)
    {
        try{
            $this->postService->status($id);
            toastr()->success('Post status updated.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to update post status.','Failed');
        }
        return redirect()->back();
    }

    public function featured($id)
    {
        try{
            $this->postService->featured($id);
            toastr()->success('Post featured status updated.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to update post featured status.','Failed');
        }
        return redirect()->back();
    }

    public function destroyGallery($id)
    {
        try{
            $this->galleryService->delete($id);
            toastr()->success('Image deleted successfully.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to delete image.','Failed');
        }
        return redirect()->back();
    }
}
