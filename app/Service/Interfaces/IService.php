<?php

namespace App\Service\Interfaces;

use App\Model\Blog;

interface IService
{
    public function getServiceBySlug($slug);

    public function saveService(Blog $post);

    public function editService($id,Blog $post);
}
