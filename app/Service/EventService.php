<?php

namespace App\Service;

use App\Enums\MediaType;
use App\Enums\PostType;
use App\Model\Blog;
use App\Model\Event;
use App\Model\Gallery;
use App\Repositories\Interfaces\IEventRepository;
use App\Repositories\Interfaces\IGalleryRepository;
use App\Repositories\Interfaces\IPostRepository;
use App\Service\Interfaces\IEventService;
use App\Util\FunctionUtil;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class EventService implements IEventService
{
    public function __construct(IPostRepository $postRepository,IGalleryRepository $galleryRepository,IEventRepository $eventRepository) {
        $this->function=new FunctionUtil();
        $this->postRepository=$postRepository;
        $this->galleryRepository=$galleryRepository;
        $this->eventRepository=$eventRepository;
    }

    public function getAllEvents(){
        return $this->eventRepository->getAllEvents();
    }

    public function getUpcomingEvents(){
        return $this->eventRepository->getUpcomingEvents();
    }

    public function getOngoingEvents(){
        return $this->eventRepository->getOngoingEvents();
    }

    public function getPreviousEvents(){
        return $this->eventRepository->getPreviousEvents();
    }

    public function getEventBySlug($slug){
        return $this->postRepository->getPostBySlug([['slug',$slug],['post_type',PostType::Event],['status',true]]);
    }

    public function saveEvent(Blog $blog){
        try{
            DB::beginTransaction();
            $post=$this->function->blogToPost($blog);
            $post->featured=false;
            $post->status=true;
            $post->post_type=PostType::Event;
            $post->tags=$post->title.','.$post->categories()->title.','.$post->code.','.$post->categories()->code;
            $post->save();
            $time=Carbon::now()->timestamp;
            if($blog->featured_gallery){
                if(array_key_exists('media',$blog->featured_gallery)){
                    $file = $blog->featured_gallery['media'];
                    $extension = $file->getClientOriginalExtension(); // getting image extension
                    $filename ='featured_'.$post->id.'_'.$time.'.'.$extension;
                    $file->move('uploads/event/', $filename);
                    $filename='/uploads/event/'.$filename;
                    $gallery=new Gallery();
                    $gallery->media=$filename;
                    $gallery->featured=true;
                    $gallery->status=true;
                    $gallery->post_id=$post->id;
                    $gallery->save();
                }
            }
            if($blog->cover_gallery){
                if(array_key_exists('media',$blog->cover_gallery)){
                    $file = $blog->cover_gallery['media'];
                    $extension = $file->getClientOriginalExtension(); // getting image extension
                    $filename ='cover_'.$post->id.'_'.$time.'.'.$extension;
                    $file->move('uploads/event/', $filename);
                    $filename='/uploads/event/'.$filename;
                    $gallery=new Gallery();
                    $gallery->media=$filename;
                    $gallery->cover=true;
                    $gallery->status=true;
                    $gallery->post_id=$post->id;
                    $gallery->save();
                }
            }
            if($blog->floor_plan){
                if(array_key_exists('media',$blog->floor_plan)){
                    $file = $blog->floor_plan['media'];
                    $extension = $file->getClientOriginalExtension(); // getting image extension
                    $filename ='floor_plan_'.$post->id.'_'.$time.'.'.$extension;
                    $file->move('uploads/event/', $filename);
                    $filename='/uploads/event/'.$filename;
                    $gallery=new Gallery();
                    $gallery->media=$filename;
                    $gallery->title="event_floor_plan";
                    $gallery->status=false;
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
                        $file->move('uploads/event/', $filename);
                        $filename='/uploads/event/'.$filename;
                        $gallery_new=new Gallery();
                        $gallery_new->media=$filename;
                        $gallery_new->featured=false;
                        $gallery_new->status=true;
                        $gallery_new->post_id=$post->id;
                        $gallery_new->save();
                    }

                }
            }
            if($blog->brochure){
                if(array_key_exists('media',$blog->brochure)){
                    $file = $blog->brochure['media'];
                    $extension = $file->getClientOriginalExtension(); // getting image extension
                    $filename ='document_'.$post->id.'_'.$time.'.'.$extension;
                    $file->move('uploads/event/', $filename);
                    $filename='/uploads/event/'.$filename;
                    $gallery=new Gallery();
                    $gallery->media=$filename;
                    $gallery->type=MediaType::Document;
                    $gallery->featured=true;
                    $gallery->status=true;
                    $gallery->post_id=$post->id;
                    $gallery->save();
                }
            }
            if($blog->document){
                foreach($blog->document as $gallery){
                    if(array_key_exists('media',$gallery)){
                        $time=$time+1;
                        $file = $gallery['media'];
                        $extension = $file->getClientOriginalExtension(); // getting image extension
                        $filename ='document_'.$post->id.'_'.$time.'.'.$extension;
                        $file->move('uploads/event/', $filename);
                        $filename='/uploads/event/'.$filename;
                        $gallery_new=new Gallery();
                        $gallery_new->media=$filename;
                        $gallery_new->title=$gallery['name'];
                        $gallery_new->type=MediaType::Document;
                        $gallery_new->featured=false;
                        $gallery_new->status=true;
                        $gallery_new->post_id=$post->id;
                        $gallery_new->save();
                    }

                }
            }
            if($blog->video){
                $gallery=new Gallery();
                $gallery->media=$blog->video;
                $gallery->type=MediaType::Video;
                $gallery->cover=true;
                $gallery->status=true;
                $gallery->post_id=$post->id;
                $gallery->save();
            }
            $event=new Event();
            $event->from_date=$blog->from_date;
            $event->to_date=$blog->to_date;
            $event->post_id=$post->id;
            $event->save();
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollBack();
            throw new Exception("Service Down! Please try again later");
        }
    }

    public function editEvent($id,Blog $blog){
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
                    $file->move('uploads/event/', $filename);
                    $filename='/uploads/event/'.$filename;
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
            if($blog->cover_gallery){
                if(array_key_exists('media',$blog->cover_gallery)){
                    $file = $blog->cover_gallery['media'];
                    $extension = $file->getClientOriginalExtension(); // getting image extension
                    $filename ='cover_'.$post->id.'_'.$time.'.'.$extension;
                    $file->move('uploads/event/', $filename);
                    $filename='/uploads/event/'.$filename;
                    $gallery=new Gallery();
                    if(array_key_exists('id',$blog->cover_gallery)){
                        $gallery=$this->galleryRepository->get($blog->cover_gallery['id']);
                    }
                    $gallery->media=$filename;
                    $gallery->cover=true;
                    $gallery->status=true;
                    $gallery->post_id=$post->id;
                    $gallery->save();
                }
            }
            if($blog->floor_plan){
                if(array_key_exists('media',$blog->floor_plan)){
                    $file = $blog->floor_plan['media'];
                    $extension = $file->getClientOriginalExtension(); // getting image extension
                    $filename ='floor_plan_'.$post->id.'_'.$time.'.'.$extension;
                    $file->move('uploads/event/', $filename);
                    $filename='/uploads/event/'.$filename;
                    $gallery=new Gallery();
                    if(array_key_exists('id',$blog->floor_plan)){
                        $gallery=$this->galleryRepository->get($blog->floor_plan['id']);
                    }
                    $gallery->media=$filename;
                    $gallery->title="event_floor_plan";
                    $gallery->status=false;
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
                        $file->move('uploads/event/', $filename);
                        $filename='/uploads/event/'.$filename;
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

            if($blog->brochure){
                if(array_key_exists('media',$blog->brochure)){
                    $file = $blog->brochure['media'];
                    $extension = $file->getClientOriginalExtension(); // getting image extension
                    $filename ='document_'.$post->id.'_'.$time.'.'.$extension;
                    $file->move('uploads/event/', $filename);
                    $filename='/uploads/event/'.$filename;
                    $gallery=new Gallery();
                    if(array_key_exists('id',$blog->brochure)){
                        $gallery=$this->galleryRepository->get($blog->brochure['id']);
                    }
                    $gallery->media=$filename;
                    $gallery->type=MediaType::Document;
                    $gallery->featured=true;
                    $gallery->status=true;
                    $gallery->post_id=$post->id;
                    $gallery->save();
                }
            }
            if($blog->document){
                foreach($blog->document as $gallery){
                    if(array_key_exists('media',$gallery)){
                        $time=$time+1;
                        $file = $gallery['media'];
                        $extension = $file->getClientOriginalExtension(); // getting image extension
                        $filename ='document_'.$post->id.'_'.$time.'.'.$extension;
                        $file->move('uploads/event/', $filename);
                        $filename='/uploads/event/'.$filename;
                        $gallery_new=new Gallery();
                        if(array_key_exists('id',$gallery)){
                            $gallery_new=$this->galleryRepository->get($gallery['id']);
                        }
                        $gallery_new->media=$filename;
                        $gallery_new->title=$gallery['name'];
                        $gallery_new->type=MediaType::Document;
                        $gallery_new->featured=false;
                        $gallery_new->status=true;
                        $gallery_new->post_id=$post->id;
                        $gallery_new->save();
                    }

                }
            }
            if($blog->video){
                $gallery=new Gallery();
                $video=$this->galleryRepository->getVideo($post->id);
                if($video){
                    $gallery=$video;
                }
                $gallery->media=$blog->video;
                $gallery->type=MediaType::Video;
                $gallery->cover=true;
                $gallery->status=true;
                $gallery->post_id=$post->id;
                $gallery->save();
            }
            $event=$this->eventRepository->getEventByPost($post->id);
            $event->from_date=$blog->from_date;
            $event->to_date=$blog->to_date;
            $event->post_id=$post->id;
            $event->save();
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollBack();
            throw new Exception("Service Down! Please try again later");
        }
    }
}
