<?php

namespace App\Service;

use App\Enums\PostType;
use App\Model\Blog;
use App\Model\Gallery;
use App\Model\Post;
use App\Repositories\Interfaces\IGalleryRepository;
use App\Repositories\Interfaces\IPostRepository;
use App\Service\Interfaces\IBannerService;
use App\Service\Interfaces\IPostService;
use App\Util\FunctionUtil;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;

class BannerService implements IBannerService
{

    public function __construct(IPostRepository $postRepository,IGalleryRepository $galleryRepository) {
        $this->function=new FunctionUtil();
        $this->postRepository=$postRepository;
        $this->galleryRepository=$galleryRepository;
    }

    public function saveBanner(Blog $blog){
        try{
            DB::beginTransaction();
            $post=$this->function->blogToPost($blog);
            $post->featured=false;
            $post->status=true;
            $post->post_type=PostType::Banner;
            $post->tags=$post->title.','.$post->categories()->title.','.$post->code.','.$post->categories()->code;
            $post->save();
            $time=Carbon::now()->timestamp;
            if($blog->featured_gallery){
                if(array_key_exists('media',$blog->featured_gallery)){
                    $file = $blog->featured_gallery['media'];
                    $extension = $file->getClientOriginalExtension(); // getting image extension
                    $filename ='banner_'.$post->id.'_'.$time.'.'.$extension;
                    $file->move('uploads/banners/', $filename);
                    $filename='/uploads/banners/'.$filename;
                    $gallery=new Gallery();
                    $gallery->media=$filename;
                    $gallery->featured=true;
                    $gallery->status=true;
                    $gallery->post_id=$post->id;
                    $gallery->save();
                }
            }
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollBack();
            throw new Exception("Service Down! Please try again later");
        }
    }

    public function editBanner($id,Blog $blog){
        try{
            DB::beginTransaction();
            $post=$this->postRepository->get($id);
            $post=$this->function->blogToPost($blog,$post);
            $post->id=$id;
            $post->tags=$post->title.','.$post->categories()->title.','.$post->code.','.$post->categories()->code;
            $post->save();
            $time=Carbon::now()->timestamp;
            if($blog->featured_gallery){
                if(array_key_exists('media',$blog->featured_gallery)){
                    $file = $blog->featured_gallery['media'];
                    $extension = $file->getClientOriginalExtension(); // getting image extension
                    $filename ='banner_'.$post->id.'_'.$time.'.'.$extension;
                    $file->move('uploads/banners/', $filename);
                    $filename='/uploads/banners/'.$filename;
                    $gallery=new Gallery();
                    if(array_key_exists('id',$blog->featured_gallery)){
                        $gallery=$this->galleryRepository->get($blog->featured_gallery['id']);
                    }
                    $gallery->media=$filename;
                    $gallery->featured=true;
                    $gallery->status=true;
                    $gallery->post_id=$post->id;
                    $gallery->save();
                }
            }
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollBack();
            throw new Exception("Service Down! Please try again later");
        }
    }

}

