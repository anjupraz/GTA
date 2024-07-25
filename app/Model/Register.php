<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Register extends Model
{
    use SoftDeletes;
    protected $table = 'users';

    protected $fillable = [
        'name', 'profile','role', 'gender', 'contact','email', 'password','country','status','email_verified_at'
    ];
}
