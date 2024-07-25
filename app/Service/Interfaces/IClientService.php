<?php

namespace App\Service\Interfaces;

use App\Model\Blog;

interface IClientService
{
    public function saveClient(Blog $post);

    public function editClient($id,Blog $post);
}
