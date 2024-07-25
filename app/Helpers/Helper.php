<?php

namespace App\Helpers;
use App\Service\Interfaces\ITripService;
use App\Enums\DifficultyType;
use App\Enums\PostType;
use App\Enums\ProvinceType;
use App\Model\Category;
use App\Model\Post;
use Carbon\Carbon;
use App\Model\Trip;
class Helper
{


    public static function days($date){
        $today = Carbon::now();
        $created_at=$date->format('Y-m-d');
        $difference = $today->diffInDays($created_at, false) * -1;
        return $difference;
    }

    public static function getBanner(){
        $post=Post::where([['post_type',PostType::Banner],['status',true]])->first();
        if($post != null){
            return $post->featured()->media;
        }
        return null;
    }

    public static function getBlogCategory(){
        $categoryList=Category::where([['post_type',PostType::Blog],['status',true]])->get();
        return $categoryList;
    }

    public static function getServiceCategory(){
        $serviceList=Category::where([['post_type',PostType::Service],['status',true]])->get();
        return $serviceList;
    }

    public static function getImpactCategory(){
        $impactList=Category::where([['post_type',PostType::Impact],['status',true]])->get();
        return $impactList;
    }

    public static function getLatestBlog(){
        $blogList=Post::where([['post_type',PostType::Blog],['status',true]])->limit(5)->orderBy('id', 'DESC')->get();
        return $blogList;
    }
}
