<?php

namespace App\Service\Interfaces;

use App\Model\Blog;

interface INoticeService
{
    public function saveNotice(Blog $post);

    public function editNotice($id,Blog $post);
}
