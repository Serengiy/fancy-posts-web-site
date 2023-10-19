<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

//    public function messages(): array
//    {
//        return [
//            'first_name.required' => 'A title is required',
//            'last_name.required' => 'Choose at least one tag',
//            'email.required'=> 'Choose main picture',
//            'password.required'=> 'Choose preview picture',
//            'password_confirmation.required'=> 'Choose preview picture',
//            'profile_pict.required'=> 'Choose preview picture',
//        ];
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|min:4',
            'last_name' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'profile_picture'=> 'required|mimes:jpg,jpeg,png,webp',
        ];
    }
}
