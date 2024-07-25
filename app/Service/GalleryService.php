<?php

namespace App\Service;

use App\Enums\PostType;
use App\Model\Blog;
use App\Model\Gallery;
use App\Repositories\Interfaces\IGalleryRepository;
use App\Repositories\Interfaces\IPostRepository;
use App\Service\Interfaces\IGalleryService;
use App\Util\FunctionUtil;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class GalleryService implements IGalleryService
{

    public function __construct(IGalleryRepository $galleryRepository,IPostRepository $postRepository) {
        $this->function=new FunctionUtil();
        $this->galleryRepository=$galleryRepository;
        $this->postRepository=$postRepository;
    }

    public function getGalleryBySlug($slug){
        return $this->postRepository->getPostBySlug([['slug',$slug],['post_type',PostType::Gallery],['status',true]]);
    }

    public function saveGallery(Blog $blog){
        try{
            DB::beginTransaction();
            $post=$this->function->blogToPost($blog);
            $post->featured=false;
            $post->status=true;
            $post->post_type=PostType::Gallery;
            $post->tags=$post->title.','.$post->categories()->title.','.$post->code.','.$post->categories()->code;
            $post->save();
            $time=Carbon::now()->timestamp;
            if($blog->featured_gallery){
                if(array_key_exists('media',$blog->featured_gallery)){
                    $file = $blog->featured_gallery['media'];
                    $extension = $file->getClientOriginalExtension(); // getting image extension
                    $filename ='featured_'.$post->id.'_'.$time.'.'.$extension;
                    $file->move('uploads/gallery/', $filename);
                    $filename='/uploads/gallery/'.$filename;
                    $gallery=new Gallery();
                    $gallery->media=$filename;
                    $gallery->featured=true;
                    $gallery->status=true;
                    $gallery->post_id=$post->id;
                    $gallery->save();
                }
            }
            if($blog->gallery){
                foreach($blog->gallery as $gallery){
                    if(array_key_exists('media',$gallery)){
                        $time=$time+1;
                        $file = $gallery['media'];
                        $extension = $file->getClientOriginalExtension(); // getting image extension
                        $filename ='gallery_'.$post->id.'_'.$time.'.'.$extension;
                        $file->move('uploads/gallery/', $filename);
                        $filename='/uploads/gallery/'.$filename;
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

    public function editGallery($id,Blog $blog){
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
                    $filename ='featured_'.$post->id.'_'.$time.'.'.$extension;
                    $file->move('uploads/gallery/', $filename);
                    $filename='/uploads/gallery/'.$filename;
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
            if($blog->gallery){
                foreach($blog->gallery as $gallery){
                    if(array_key_exists('media',$gallery)){
                        $time=$time+1;
                        $file = $gallery['media'];
                        $extension = $file->getClientOriginalExtension(); // getting image extension
                        $filename ='gallery_'.$post->id.'_'.$time.'.'.$extension;
                        $file->move('uploads/gallery/', $filename);
                        $filename='/uploads/gallery/'.$filename;
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

    public function delete($id){
        try{
            DB::beginTransaction();
            $this->galleryRepository->delete($id);
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollBack();
            throw new Exception("Service Down! Please try again later");
        }
    }

    public function getGalleryPagination($limit){
        $query=[['status',true],['post_type',PostType::Gallery]];
        return $this->postRepository->getByPagination($limit,$query);
    }
}
