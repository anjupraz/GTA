<?php

namespace App\Service\Interfaces;

use App\Enums\PostType;
use App\Http\Requests\BlogRequest;
use App\Model\Blog;
use App\Model\Post;

interface IPostService
{
    public function saveBlog(Blog $post);

    public function editBlog($id,Blog $post);

    public function getByType($type);

    public function getByTypeLimit($limit,$type);

    public function getByTypeStatus($status,$type);

    public function getByTypeStatusReverse($status,$type);

    public function getPostCount($type);

    public function getBlogById($id);

    public function getById($id);

    public function delete($id);

    public function status($id);

    public function featured($id);

    public function getPopularBlog($limit);

    public function getBlogPagination($limit,$category);

    public function getPostBySlug($slug);

}
