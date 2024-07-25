<?php

namespace App\Service;

use App\Enums\PostType;
use App\Model\Blog;
use App\Model\Gallery;
use App\Model\Post;
use App\Repositories\Interfaces\IGalleryRepository;
use App\Repositories\Interfaces\IPostRepository;
use App\Service\Interfaces\IPostService;
use App\Service\Interfaces\IService;
use App\Util\FunctionUtil;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;

class Service implements IService
{

    public function __construct(IPostRepository $postRepository,IGalleryRepository $galleryRepository) {
        $this->function=new FunctionUtil();
        $this->postRepository=$postRepository;
        $this->galleryRepository=$galleryRepository;
    }

    public function getServiceBySlug($slug){
        return $this->postRepository->getPostBySlug([['slug',$slug],['post_type',PostType::Service],['status',true]]);
    }

    public function saveService(Blog $service){
        try{
            DB::beginTransaction();
            $post=$this->function->blogToPost($service);
            $post->featured=false;
            $post->status=true;
            $post->post_type=PostType::Service;
            $post->tags=$post->title.','.$post->categories()->title.','.$post->code.','.$post->categories()->code;
            $post->save();
            $time=Carbon::now()->timestamp;
            if($service->featured_gallery){
                if(array_key_exists('media',$service->featured_gallery)){
                    $file = $service->featured_gallery['media'];
                    $extension = $file->getClientOriginalExtension(); // getting image extension
                    $filename ='featured_'.$post->id.'_'.$time.'.'.$extension;
                    $file->move('uploads/services/', $filename);
                    $filename='/uploads/services/'.$filename;
                    $gallery=new Gallery();
                    $gallery->media=$filename;
                    $gallery->featured=true;
                    $gallery->status=true;
                    $gallery->post_id=$post->id;
                    $gallery->save();
                }
            }
            if($service->gallery){
                foreach($service->gallery as $gallery){
                    if(array_key_exists('media',$gallery)){
                        $time=$time+1;
                        $file = $gallery['media'];
                        $extension = $file->getClientOriginalExtension(); // getting image extension
                        $filename ='gallery_'.$post->id.'_'.$time.'.'.$extension;
                        $file->move('uploads/services/', $filename);
                        $filename='/uploads/services/'.$filename;
                        $gallery_new=new Gallery();
                        $gallery_new->media=$filename;
                        $gallery_new->featured=false;
                        $gallery_new->status=true;
                        $gallery_new->post_id=$post->id;
                        $gallery_new->save();
                    }

                }
            }
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollBack();
            throw new Exception("Service Down! Please try again later");
        }
    }

    public function editService($id,Blog $service){
        try{
            DB::beginTransaction();
            $post=$this->postRepository->get($id);
            $post=$this->function->blogToPost($service,$post);
            $post->id=$id;
            $post->tags=$post->title.','.$post->categories()->title.','.$post->code.','.$post->categories()->code;
            $post->save();
            $time=Carbon::now()->timestamp;
            if($service->featured_gallery){
                if(array_key_exists('media',$service->featured_gallery)){
                    $file = $service->featured_gallery['media'];
                    $extension = $file->getClientOriginalExtension(); // getting image extension
                    $filename ='featured_'.$post->id.'_'.$time.'.'.$extension;
                    $file->move('uploads/services/', $filename);
                    $filename='/uploads/services/'.$filename;
                    $gallery=new Gallery();
                    if(array_key_exists('id',$service->featured_gallery)){
                        $gallery=$this->galleryRepository->get($service->featured_gallery['id']);
                    }
                    $gallery->media=$filename;
                    $gallery->featured=true;
                    $gallery->status=true;
                    $gallery->post_id=$post->id;
                    $gallery->save();
                }
            }
            if($service->gallery){
                foreach($service->gallery as $gallery){
                    if(array_key_exists('media',$gallery)){
                        $time=$time+1;
                        $file = $gallery['media'];
                        $extension = $file->getClientOriginalExtension(); // getting image extension
                        $filename ='gallery_'.$post->id.'_'.$time.'.'.$extension;
                        $file->move('uploads/services/', $filename);
                        $filename='/uploads/services/'.$filename;
                        $gallery_new=new Gallery();
                        if(array_key_exists('id',$gallery)){
                            $gallery_new=$this->galleryRepository->get($gallery['id']);
                        }
                        $gallery_new->media=$filename;
                        $gallery_new->featured=false;
                        $gallery_new->status=true;
                        $gallery_new->post_id=$post->id;
                        $gallery_new->save();
                    }

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

