<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule as ValidationRule;

class PostRequest extends FormRequest
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
            'slug' => 'required',
            'detail' => 'required',
            'category_id' => ['required', ValidationRule::exists('categories', 'id')]
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Enter Your Title',
            'slug.required' => 'Enter Your Slug',
            'detail.required' => 'Enter Your Detail',
            'category_id.required' => 'Choose Your Level'
        ];
    }
}
