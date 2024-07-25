<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'category_id' => 'required',
            'featured_gallery' => 'required',
            'team_order' => 'required|unique:teams,team_order',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'code' => 'TM-' . $this->code,
        ]);
    }
}
