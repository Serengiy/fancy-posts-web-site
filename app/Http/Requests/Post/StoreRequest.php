<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function messages(): array
    {
        return [
            'title.required' => 'A title is required',
            'tags.required' => 'Choose at least one tag',
            'main-pic.required'=> 'Choose main picture',
            'preview-pic.required'=> 'Choose preview picture',
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:15',
            'content' => 'required|min:40',
            'tags' => 'required|array',
            'main_pic'=> 'required|mimes:jpg,jpeg,png,webp',
            'preview_pic'=> 'required|mimes:jpg,jpeg,png,webp,avif',
        ];
    }

}
