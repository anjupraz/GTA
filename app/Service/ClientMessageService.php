<?php

namespace App\Service;

use App\Enums\PostType;
use App\Model\Blog;
use App\Model\Gallery;
use App\Model\Post;
use App\Repositories\Interfaces\IGalleryRepository;
use App\Repositories\Interfaces\IPostRepository;
use App\Service\Interfaces\IBannerService;
use App\Service\Interfaces\IClientMessageService;
use App\Service\Interfaces\IClientService;
use App\Service\Interfaces\IPostService;
use App\Util\FunctionUtil;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;

class ClientMessageService implements IClientMessageService
{

    public function __construct(IPostRepository $postRepository,IGalleryRepository $galleryRepository) {
        $this->function=new FunctionUtil();
        $this->postRepository=$postRepository;
        $this->galleryRepository=$galleryRepository;
    }

    public function saveClientMessage(Blog $blog){
        try{
            DB::beginTransaction();
            $post=$this->function->blogToPost($blog);
            $post->featured=false;
            $post->status=true;
            $post->post_type=PostType::Client_Message;
            $post->tags=$post->categories()->title.','.$post->code.','.$post->categories()->code;
            $post->save();
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollBack();
            throw new Exception("Service Down! Please try again later");
        }
    }

    public function editClientMessage($id,Blog $blog){
        try{
            DB::beginTransaction();
            $post=$this->postRepository->get($id);
            $post=$this->function->blogToPost($blog,$post);
            $post->id=$id;
            $post->tags=$post->categories()->title.','.$post->code.','.$post->categories()->code;
            $post->save();
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollBack();
            throw new Exception("Service Down! Please try again later");
        }
    }

    public function getClientMessagePagination($limit){
        $query=[['status',true],['post_type',PostType::Client_Message]];
        return $this->postRepository->getByPagination($limit,$query);
    }

}

