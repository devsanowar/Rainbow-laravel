<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembersStoreRequest extends FormRequest
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
            'sponsor_username' => 'required|string|max:255|unique:users,sponsor_username',
            'password' => 'required|string|min:6|confirmed',
            'name' => 'required|string|max:255',
            'authentication_type' => 'required|in:NID,Birth,Passport',
            'authentication_number' => 'required',
            'phone' => 'required|regex:/^01[0-9]{9}$/',
            'division_id' => 'required|exists:divisions,id',
            'district_id' => 'required|exists:districts,id',
            'upazila_id' => 'required|exists:upazilas,id',
            'union_id' => 'required|exists:unions,id',
            'position' => 'required|in:left,right',
            'date_of_birth' => 'required|date',
            'email' => 'nullable|email|max:255',
            'termsCheck' => 'accepted',
        ];
    }

    public function messages()
    {
        return [
            'sponsor_username.required' => 'Sponsor username is required.',
            'sponsor_username.unique' => 'This sponsor username already exists.',
            'password.required' => 'Password is required.',
            'password.confirmed' => 'Password confirmation does not match.',
            'name.required' => 'Full name is required.',
            'authentication_type.required' => 'Please select an authentication type.',
            'authentication_number.required' => 'Authentication number is required.',
            'phone.required' => 'Mobile number is required.',
            'phone.regex' => 'Mobile number format is invalid.',
            'division_id.required' => 'Please select a division.',
            'district_id.required' => 'Please select a district.',
            'upazila_id.required' => 'Please select an upazila.',
            'union_id.required' => 'Please select a union.',
            'position.required' => 'Position is required.',
            'date_of_birth.required' => 'Date of birth is required.',
            'email.email' => 'Please enter a valid email address.',
            'termsCheck.accepted' => 'You must accept the terms and conditions.',
        ];
    }
}
