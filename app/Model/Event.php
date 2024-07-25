<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;
    protected $table = 'events';

	protected $fillable = [
        'from_date',
        'to_date',
        'post_id',
    ];

    public function post(){
        return $this->belongsTo(Post::class, 'post_id','id')->first();
    }

    public function postFilter(){
        return $this->belongsTo(Post::class, 'post_id','id');
    }
}
