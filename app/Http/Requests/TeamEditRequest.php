<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class TeamEditRequest extends FormRequest
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
        $post_id = $this->id;
        Log::debug($post_id);
        return [
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'featured_gallery' => 'required',
            'team_order' => ['required', Rule::unique('teams', 'team_order')->ignore($this->id, 'post_id')],
        ];
    }
}
