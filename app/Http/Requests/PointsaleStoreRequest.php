<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PointsaleStoreRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:1',
            'points' => 'required|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'Please select a member.',
            'user_id.exists' => 'The selected member was not found in the system.',

            'amount.required' => 'Amount is required.',
            'amount.numeric' => 'Amount must be a valid number.',
            'amount.min' => 'Amount must be at least 1.',

            'points.required' => 'Points are required.',
            'points.integer' => 'Points must be an integer.',
            'points.min' => 'Points must be at least 1.',
        ];
    }
}
