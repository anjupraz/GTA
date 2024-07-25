<?php

namespace App\Service;

use App\Enums\PostType;
use App\Model\Category;
use App\Repositories\Interfaces\ICategoryRepository;
use App\Service\Interfaces\ICategoryService;
use App\Util\FunctionUtil;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class CategoryService implements ICategoryService
{

    public function __construct(ICategoryRepository $categoryRepository) {
        $this->function=new FunctionUtil();
        $this->categoryRepository = $categoryRepository;
    }

    public function getById($id){
        try{
            return $this->categoryRepository->get($id);
        }
        catch(\Exception $e){
            return "Service Down! Please try again later";
        }
    }

    public function getByIdType($id,$type){
        try{
            return $this->categoryRepository->getByIdType($id,$type);
        }
        catch(\Exception $e){
            return "Service Down! Please try again later";
        }
    }

    public function getByCode($code){
        try{
            return $this->categoryRepository->getByCode($code);
        }
        catch(\Exception $e){
            return "Service Down! Please try again later";
        }
    }

    public function save(Category $category){
        try{
            $filename=null;
            if($category->profile){
                $file = $category->profile;
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $filename=Carbon::now()->timestamp.'.'.$extension;
                $file->move('uploads/category/', $filename);
                $filename='/uploads/category/'.$filename;
            }
            DB::beginTransaction();
            $category->featured=false;
            $category->status=true;
            if($filename != null){
                $category->profile=$filename;
            }
            $category->save();
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollBack();
            throw new Exception("Service Down! Please try again later");
        }
    }

    public function getByType($type){
        return $this->categoryRepository->getWhere([['post_type',$type]]);
    }

    public function getByTypeStatus($type,$status){
        return $this->categoryRepository->getWhere([['post_type',$type],['status',$status]]);
    }

    public function update($id,Category $data){
        try{
            $filename=null;
            if($data->profile){
                $file = $data->profile;
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $filename=Carbon::now()->timestamp.'.'.$extension;
                $file->move('uploads/category/', $filename);
                $filename='/uploads/category/'.$filename;
            }
            DB::beginTransaction();
            $category=$this->categoryRepository->get($id);
            $category->title=$data->title;
            $category->description=$data->description;
            if($filename != null){
                $category->profile=$filename;
            }
            $category->save();
            DB::commit();
            return $category->post_type;
        }
        catch(\Exception $e){
            DB::rollBack();
            throw new Exception("Service Down! Please try again later");
        }
    }

    public function delete($id){
        try{
            DB::beginTransaction();
            $this->categoryRepository->delete($id);
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollBack();
            throw new Exception("Service Down! Please try again later");
        }
    }

    public function status($id){
        try{
            DB::beginTransaction();
            $category=$this->categoryRepository->get($id);
            if($category->status){
                $category->status=false;
            }
            else{
                $category->status=true;
            }
            $category->save();
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollBack();
            throw new Exception("Service Down! Please try again later");
        }
    }

    public function featured($id){
        try{
            DB::beginTransaction();
            $category=$this->categoryRepository->get($id);
            if($category->featured){
                $category->featured=false;
            }
            else{
                $category->featured=true;
            }
            $category->save();
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollBack();
            throw new Exception("Service Down! Please try again later");
        }
    }
}
