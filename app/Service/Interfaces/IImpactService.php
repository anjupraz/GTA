<?php

namespace App\Service\Interfaces;

use App\Model\Blog;

interface IImpactService
{
    public function getImpactBySlug($slug);

    public function saveImpact(Blog $post);

    public function editImpact($id,Blog $post);
}
