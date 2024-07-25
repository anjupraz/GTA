<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'accomodation_rating' => 'required|numeric',
            'destination_rating' => 'required|numeric',
            'meals_rating' => 'required|numeric',
            'transport_rating' => 'required|numeric',
            'value_rating' => 'required|numeric',
            'itinerary_rating' => 'required|numeric',
            'post_id' => 'required',
        ];
    }
}
