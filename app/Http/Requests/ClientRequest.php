<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'code' => 'required|alpha_dash|unique:posts',
            'description' => 'required',
            'featured_gallery' => 'required'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'code' => 'CL-'.$this->code,
        ]);
    }

}
