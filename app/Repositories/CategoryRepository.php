<?php

namespace App\Repositories;

use App\Model\Category;
use App\Repositories\Interfaces\ICategoryRepository;

class CategoryRepository implements ICategoryRepository
{

    public function get($id)
    {
        return Category::find($id);
    }

    public function all()
    {
        return Category::all();
    }


    public function delete($id)
    {
        Category::destroy($id);
    }


    public function update($id, array $data)
    {
        Category::find($id)->update($data);
    }

    public function getWhere($query=[]){
        $category=Category::where($query);
        return $category->get();
    }

    public function getByCode($code){
        return Category::where([['code',$code]])->first();
    }

    public function getByIdType($id,$type){
        return Category::where([['id',$id],['post_type',$type],['status',true]])->first();
    }

    public function getByLimit($limit,$query=[]){
        $category=Category::where($query)->limit($limit)->orderBy('updated_at', 'DESC');
        return $category->get();
    }
}
