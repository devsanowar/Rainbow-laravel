<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
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
            'cus_username' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z0-9]+$/',
                'unique:users,cus_username', // Only letters and spaces
            ],
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z\s]+$/', // Only letters and spaces
            ],
            'phone' => [
                'required',
                'string',
                'regex:/^01[3-9][0-9]{8}$/', // Bangladeshi phone format: 11 digits starting with 013-019
                'unique:users,phone', // Ensures phone is unique in 'users' table
            ],
            'password' => ['required', 'string', 'min:6', 'max:64', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/'],
        ];
    }

    public function messages()
    {
        return [
            'cus_username.required' => 'Username is required.',
            'cus_username.string' => 'Username must be a valid string.',
            'cus_username.max' => 'Username must not exceed 255 characters.',
            'cus_username.regex' => 'Username may only contain letters and numbers without spaces.',
            'cus_username.unique' => 'This username is already taken.',

            'name.required' => 'Full name is required.',
            'name.string' => 'Name must be a valid string.',
            'name.max' => 'Name must not exceed 255 characters.',
            'name.regex' => 'Name can only contain letters and spaces.',

            'phone.required' => 'Phone number is required.',
            'phone.string' => 'Phone number must be a string.',
            'phone.regex' => 'Phone number must be a valid Bangladeshi number (e.g. 017xxxxxxxx).',
            'phone.unique' => 'This phone number is already registered.',

            'password.required' => 'Password is required.',
            'password.string' => 'Password must be a valid string.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.max' => 'Password must not exceed 64 characters.',
            'password.confirmed' => 'Password confirmation does not match.',
            'password.regex' => 'Password must include at least one uppercase letter, one lowercase letter, one number, and one special character.',
        ];
    }
}
