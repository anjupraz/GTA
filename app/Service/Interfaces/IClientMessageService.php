<?php

namespace App\Service\Interfaces;

use App\Model\Blog;

interface IClientMessageService
{
    public function saveClientMessage(Blog $post);

    public function editClientMessage($id,Blog $post);

    public function getClientMessagePagination($limit);
}
