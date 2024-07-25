<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
	use SoftDeletes;
    protected $table = 'contacts';

	protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'created_at',
    ];
}
