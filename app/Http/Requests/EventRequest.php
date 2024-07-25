<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'title' => 'required',
            'slug' => 'required|alpha_dash|unique:posts',
            'code' => 'required|alpha_dash|unique:posts',
            'from_date' => 'required',
            'to_date' => 'required',
            'description' => 'required',
            'featured_gallery' => 'required',
            'cover_gallery' => 'required',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'code' => 'E-'.$this->code,
        ]);
    }
}
