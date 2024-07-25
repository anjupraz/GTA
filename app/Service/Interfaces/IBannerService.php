<?php

namespace App\Service\Interfaces;

use App\Model\Blog;

interface IBannerService
{
    public function saveBanner(Blog $post);

    public function editBanner($id,Blog $post);
}
