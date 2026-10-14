<?php

namespace App\Http\Requests;

use App\Helpers\ApiResponse;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Override;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    #[Override]
    protected function failedValidation(Validator $validator)
    {
        if($this->is("api/*")) {
            $response = ApiResponse::response($validator->errors(), 'Validation failed', 422);
            throw new ValidationException($validator, $response);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $user = $this->route('user');
        return [
            'name' => request()->isMethod('POST') ? 'required|string|max:255' : 'nullable',
            'email' => ['required', Rule::Unique('users')->ignore($user)],
            'password' => request()->isMethod('POST') ? 'required|confirmed|max:255' : 'nullable',
            'image' => [
                $this->isMethod('post') ? 'nullable' : 'nullable',
                'file',
                // 'image',
                // 'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],
            'role' => request()->isMethod('POST') ? 'required|exists:roles,id' : 'nullable',
        ];
    }

    #[\Override]
    public function attributes()
    {
        return [
            'name' => 'Username',
            'email' => 'Email Address',
            'password' => 'Password',
            'image' => 'Profile Image',
            'role' => 'Role',
        ];
    }
}
