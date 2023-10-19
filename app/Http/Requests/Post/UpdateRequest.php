<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'nullable|min:15',
            'content' => 'nullable|min:40',
            'tags' => 'nullable|array',
            'main_pic'=> 'nullable|mimes:jpg,jpeg,png,webp',
            'preview_pic'=> 'nullable|mimes:jpg,jpeg,png,webp',
        ];
    }
}
