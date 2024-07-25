<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;
    protected $table = 'galleries';

	protected $fillable = [
        'media',
        'featured',
        'cover',
		'status',
        'post_id',
        'type',
        'title'
    ];
}
