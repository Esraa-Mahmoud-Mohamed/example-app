<?php

namespace App\Http\Requests;

use App\Helpers\ApiResponse;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Override;

class PostRequest extends FormRequest
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
        return [
            'title' => [
                'required',
                'max:255',
                Rule::unique('posts', 'title')->ignore($this->route('post')),
            ],
            'title_ar' => [
                'required',
                'max:255',
                Rule::unique('posts', 'title_ar')->ignore($this->route('post')),
            ],
            "content" => "required",
            "content_ar" => "required",
            "user_id" => "exists:users",
            "images" => "array|nullable",
            "images.*" => "image|mimes:jpg,png,jpeg|max:2048",
            "categories" => ["required", "min:1"],
            "categories.*" => [Rule::exists('categories', 'id')]
        ];
    }
}
