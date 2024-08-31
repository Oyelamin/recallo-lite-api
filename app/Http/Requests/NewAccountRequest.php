<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewAccountRequest extends FormRequest
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
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users,email',
            'password' => 'required|string|confirmed|min:6',
            'business_name' => 'required|string|between:2,100,unique:users,business_name',
        ];
    }

    public function messages(): array
    {
        return [
            'email.unique' => 'Email already exists. Kindly login with your credentials.',
        ];
    }
}
