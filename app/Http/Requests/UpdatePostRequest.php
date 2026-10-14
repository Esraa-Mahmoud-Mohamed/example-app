<?php

namespace App\Http\Requests;

use App\Helpers\ApiResponse;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Override;

class UpdatePostRequest extends FormRequest
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
        if ($this->is("api/*")) {
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
        $post = $this->route('post');

        return [
            'title' => [
                'sometimes',
                'string',
                'max:255',
                Rule::unique('posts', 'title')->ignore($post),
            ],

            'title_ar' => [
                'sometimes',
                'string',
                'max:255',
                Rule::unique('posts', 'title_ar')->ignore($post),
            ],

            'content' => ['sometimes', 'string'],
            'content_ar' => ['sometimes', 'string'],

            'user_id' => [
                'sometimes',
                'exists:users,id',
            ],

            'images' => ['sometimes', 'nullable', 'array'],
            'images.*' => [
                'image',
                'mimes:jpg,png,jpeg',
                'max:2048',
            ],

            'categories' => [
                'sometimes',
                'array',
                'min:1',
            ],

            'categories.*' => [
                Rule::exists('categories', 'id'),
            ],
        ];
    }
}
