<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TeamDetail extends Model
{
    protected $fillable = [
        'title',
        'code',
        'description',
        'post_type',
        'category_id',
        'created_by',
        'facebook',
        'twitter',
        'google',
        'linkedin',
        'instagram',
        'biography',
        'featured_gallery',
        'team_order'
    ];
}
