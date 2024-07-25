<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class Category extends Model
{
    use SoftDeletes;
    protected $table = 'categories';

    protected $fillable = [
        'title',
        'profile',
        'tags',
        'code',
        'description',
        'post_type',
        'featured',
        'status'
    ];

    public function post($category)
    {
        return Post::where([['category_id', $category], ['status', true]])->get();
    }

    public function postTitle($category)
    {
        return Post::where([['category_id', $category], ['status', true]])->select(['title', 'slug'])->get();
    }
    public function team($category)
    {
        $team = Post::where([['category_id', $category], ['status', true]])->with(['featuredData', 'teamData'])->get();

        return $team->sortBy('teamData.team_order')->toArray();
    }
}
