<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberloginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
       return [
            'member_username' => 'required|string|max:255',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'member_username.required' => 'Member username is required.',
            'password.required' => 'Password is required.',
        ];
    }


}
