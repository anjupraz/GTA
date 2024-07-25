<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

	protected $fillable = [
        'id',
        'title',
        'slug',
        'code',
        'description',
        'category_id',
        'created_by',
        'featured_gallery',
        'gallery',
        //EVENT
        'video',
        'from_date',
        'to_date',
        'floor_plan',
        'cover_gallery',
        'document',
        'brochure'

    ];

}
