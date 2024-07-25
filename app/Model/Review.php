<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;
    protected $table = 'reviews';

	protected $fillable = [
        'review_type',
        'review',
        'post_id',
		'user_id'
    ];
}
