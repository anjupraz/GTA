<?php

namespace App\Service\Interfaces;

use App\Model\Blog;

interface IGalleryService
{
    public function delete($id);

    public function saveGallery(Blog $blog);

    public function editGallery($id,Blog $blog);

    public function getGalleryPagination($limit);

    public function getGalleryBySlug($slug);
}
