<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRegisterUserRequest extends FormRequest
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
            'name' => 'required|max:100',
            'email' => 'required|email|max:256|unique:users',
            'password' => 'required|max:256|min:4|confirmed',
            'role' => ['required', Rule::in(['vendor', 'partner', 'customer'])],
        ];
    }

    public function messages(): array
    {
        return [
            'role.required' => 'You need to select one of the above options.',
        ];
    }
}
