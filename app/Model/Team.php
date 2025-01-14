<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use SoftDeletes;
    protected $table = 'teams';

    protected $fillable = [
        'id',
        'facebook',
        'twitter',
        'google',
        'linkedin',
        'instagram',
        'biography',
        'team_order'
    ];
}
