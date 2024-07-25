<?php

namespace App\Repositories;

use App\Model\Post;
use App\Model\Trip;
use App\Repositories\Interfaces\IPostRepository;

class PostRepository implements IPostRepository
{

    public function get($id)
    {
        return Post::find($id);
    }


    public function all()
    {
        return Post::all();
    }


    public function delete($id)
    {
        Post::destroy($id);
    }


    public function update($id, array $data)
    {
        Post::find($id)->update($data);
    }

    public function getWhere($query=[]){
        $post=Post::where($query)->orderBy('created_at', 'DESC');
        return $post->get();
    }

    public function getWhereReverse($query=[]){
        $post=Post::where($query)->orderBy('created_at', 'ASC');
        return $post->get();
    }

    public function getPostBySlug($query=[]){
        return Post::where($query)->first();
    }

    public function getByLimit($limit,$query=[]){
        $post=Post::where($query)->limit($limit)->orderBy('id', 'DESC');
        return $post->get();
    }

    public function getCount($query=[]){
        $post=Post::where($query)->orderBy('id', 'DESC');
        return $post->count();
    }

    public function getByPagination($limit, $query=[]){
        return Post::where($query)->orderBy('created_at', 'DESC')->paginate($limit);
    }


}
