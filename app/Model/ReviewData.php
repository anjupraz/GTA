<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ReviewData extends Model
{
    protected $fillable = [
        'accomodation_rating',
        'destination_rating',
        'meals_rating',
        'transport_rating',
        'value_rating',
        'itinerary_rating',
        'overall_rating',
        'post_id',
        'user_id',
    ];
}
