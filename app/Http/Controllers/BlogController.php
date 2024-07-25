<?php

namespace App\Http\Controllers;

use App\Enums\PostType;
use App\Service\Interfaces\ICategoryService;
use App\Service\Interfaces\IPostService;
use App\Util\FunctionUtil;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct(ICategoryService $categoryService, IPostService $postService)
    {
        $this->function = new FunctionUtil();
        $this->categoryService = $categoryService;
        $this->postService = $postService;
    }

    public function blog(Request $request, $category = null)
    {
        $categoryList = $this->categoryService->getByTypeStatus(PostType::Blog, true);
        $popularBlogList = $this->postService->getPopularBlog(10);
        $blogList = $this->postService->getBlogPagination(12, $category);
        return view('frontend.blog', compact('blogList', 'categoryList', 'popularBlogList', 'category'));
    }

    public function blogDetail($id)
    {
        try {
            $blog = $this->postService->getById($id);
            if ($blog == null) {
                toastr()->error('Blog not found.', 'Failed');
                return redirect()->route('index');
            }
            $categoryList = $this->categoryService->getByTypeStatus(PostType::Blog, true);
            $popularBlogList = $this->postService->getPopularBlog(10);
            return view('frontend.blog-detail', compact('blog', 'categoryList', 'popularBlogList'));
        } catch (Exception $e) {
            toastr()->error('Blog not found.', 'Failed');
            return redirect()->route('index');
        }
    }

    public function blogBySlug($slug)
    {
        try {
            $blog = $this->postService->getPostBySlug($slug);
            if ($blog == null) {
                toastr()->error('Blog not found.', 'Failed');
                return redirect()->route('index');
            }
            $categoryList = $this->categoryService->getByTypeStatus(PostType::Blog, true);
            $popularBlogList = $this->postService->getPopularBlog(10);
            return view('frontend.blog-detail', compact('blog', 'categoryList', 'popularBlogList'));
        } catch (Exception $e) {
            toastr()->error('Blog not found.', 'Failed');
            return redirect()->route('index');
        }
    }
}
