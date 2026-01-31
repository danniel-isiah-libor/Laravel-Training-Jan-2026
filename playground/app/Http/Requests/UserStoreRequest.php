<?php

namespace App\Http\Requests;

use App\Rules\PasswordRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserStoreRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'email' => [
                'required',
                'string',
                'email:dns,rfc',
                'max:255',
                'unique:users'
            ],
            'password' => [
                'string',
                'confirmed',
                Password::min(8)
                    ->max(12)
                    ->required()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->mixedCase()
                    ->uncompromised(),
                new PasswordRule
            ]

        ];
    }

    public function messages()
    {
        return [
            'email.email' => 'This is custom error message',
        ];
    }

    protected function prepareForValidation()
    {
        // $userId = session('user_id');

        // $this->merge(['user_id' => $userId]);
    }
}
