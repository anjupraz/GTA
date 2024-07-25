<?php

namespace App\Http\Controllers;

use App\Enums\PostType;
use App\Http\Requests\CategoryEditRequest;
use App\Model\Category;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ImpactCategoryRequest;
use App\Http\Requests\ServiceCategoryRequest;
use App\Http\Requests\TeamCategoryRequest;
use App\Service\Interfaces\ICategoryService;
use App\Util\FunctionUtil;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct(ICategoryService $categoryService) {
        $this->function=new FunctionUtil();
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blogIndex()
    {
        $type="Blog";
        $categoryList=$this->categoryService->getByType(PostType::Blog);
        return view('backend.category.index',compact('type','categoryList'));
    }

    public function serviceIndex()
    {
        $type="Service";
        $categoryList=$this->categoryService->getByType(PostType::Service);
        return view('backend.category.index',compact('type','categoryList'));
    }

    public function impactIndex()
    {
        $type="Impact";
        $categoryList=$this->categoryService->getByType(PostType::Impact);
        return view('backend.category.index',compact('type','categoryList'));
    }

    public function teamIndex()
    {
        $type="Team";
        $categoryList=$this->categoryService->getByType(PostType::Team);
        return view('backend.category.index',compact('type','categoryList'));
    }

    public function blogAdd()
    {
        $type="Blog";
        return view('backend.category.create',compact('type'));
    }

    public function serviceAdd()
    {
        $type="Service";
        return view('backend.category.create',compact('type'));
    }

    public function impactAdd()
    {
        $type="Impact";
        return view('backend.category.create',compact('type'));
    }

    public function teamAdd()
    {
        $type="Team";
        return view('backend.category.create',compact('type'));
    }

    public function blogSave(CategoryRequest $request)
    {
        try{
            $category =new Category();
            $category=$this->function->getObject($category,$request);
            $category->post_type=PostType::Blog;
            $category->tags=$category->title.','.$category->code;
            $this->categoryService->save($category);
            toastr()->success('Blog category added successfully.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to add blog category.','Failed');
        }
        return redirect()->route('blogs.category');
    }

    public function serviceSave(ServiceCategoryRequest $request)
    {
        try{
            $category =new Category();
            $category=$this->function->getObject($category,$request);
            $category->post_type=PostType::Service;
            $category->tags=$category->title.','.$category->code;
            $this->categoryService->save($category);
            toastr()->success('Service category added successfully.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to add service category.','Failed');
        }
        return redirect()->route('service.category');
    }

    public function impactSave(ImpactCategoryRequest $request)
    {
        try{
            $category =new Category();
            $category=$this->function->getObject($category,$request);
            $category->post_type=PostType::Impact;
            $category->tags=$category->title.','.$category->code;
            $this->categoryService->save($category);
            toastr()->success('Impact category added successfully.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to add impact category.','Failed');
        }
        return redirect()->route('impact.category');
    }


    public function teamSave(TeamCategoryRequest $request)
    {
        try{
            $category =new Category();
            $category=$this->function->getObject($category,$request);
            $category->post_type=PostType::Team;
            $category->tags=$category->title.','.$category->code;
            $this->categoryService->save($category);
            toastr()->success('Designation added successfully.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to add designation.','Failed');
        }
        return redirect()->route('team.category');
    }
    public function edit($id)
    {
        $category=$this->categoryService->getById($id);
        return view('backend.category.edit',compact('category'));
    }

    public function update(CategoryEditRequest $request,$id)
    {
        try{
            $category=new Category();
            $category=$this->function->getObject($category,$request);
            $category_type=$this->categoryService->update($id,$category);
            if($category_type == PostType::Blog){
                toastr()->success('Category updated.','Success');
                return redirect()->route('blogs.category');
            }
            elseif($category_type == PostType::Team){
                toastr()->success('Designation updated.','Success');
                return redirect()->route('team.category');
            }
            elseif($category_type == PostType::Service){
                toastr()->success('Category updated.','Success');
                return redirect()->route('service.category');
            }
            else{
                toastr()->success('Category updated.','Success');
                return redirect()->route('impact.region');
            }
        }
        catch(\Exception $e){
            toastr()->error('Failed to update.','Failed');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $this->categoryService->delete($id);
            toastr()->success('Data deleted successfully.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to delete data.','Failed');
        }
        return redirect()->back();
    }

    public function status($id)
    {
        try{
            $this->categoryService->status($id);
            toastr()->success('Status updated.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to update status.','Failed');
        }
        return redirect()->back();
    }

    public function featured($id)
    {
        try{
            $this->categoryService->featured($id);
            toastr()->success('Featured status updated.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to update featured status.','Failed');
        }
        return redirect()->back();
    }
}
