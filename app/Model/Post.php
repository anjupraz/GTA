<?php

namespace App\Model;

use App\Enums\MediaType;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'slug',
        'tags',
        'code',
        'description',
        'post_type',
        'category_id',
        'featured',
        'created_by',
        'status',
    ];

    public function categories()
    {
        return $this->hasOne(Category::class, 'id', 'category_id')->withTrashed()->first();
    }

    public function teamData()
    {
        return $this->hasOne(Team::class, 'post_id', 'id');
    }

    public function team()
    {
        return $this->hasOne(Team::class, 'post_id', 'id')->first();
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class, 'post_id', 'id')->where([['status', true], ['type', MediaType::Image]])->get();
    }

    public function video()
    {
        return $this->hasMany(Gallery::class, 'post_id', 'id')->where([['status', true], ['type', MediaType::Video]])->first();
    }

    public function document()
    {
        return $this->hasMany(Gallery::class, 'post_id', 'id')->where([['status', true], ['type', MediaType::Document]])->get();
    }

    public function featured()
    {
        return $this->hasOne(Gallery::class, 'post_id', 'id')->where([['status', true], ['featured', true], ['type', MediaType::Image]])->first();
    }

    public function featuredData()
    {
        return $this->hasOne(Gallery::class, 'post_id', 'id')->where([['status', true], ['featured', true], ['type', MediaType::Image]]);
    }

    public function cover()
    {
        return $this->hasOne(Gallery::class, 'post_id', 'id')->where([['status', true], ['cover', true], ['type', MediaType::Image]])->first();
    }

    public function floorPlan()
    {
        return $this->hasOne(Gallery::class, 'post_id', 'id')->where([['title', 'event_floor_plan'], ['type', MediaType::Image]])->first();
    }

    public function brochure()
    {
        return $this->hasOne(Gallery::class, 'post_id', 'id')->where([['status', true], ['featured', true], ['type', MediaType::Document]])->first();
    }

    public function schedule()
    {
        return $this->hasOne(Event::class, 'post_id', 'id')->first();
    }

    public function review()
    {
        return $this->hasMany(Review::class, 'post_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'created_by')->withTrashed()->first();
    }
}
