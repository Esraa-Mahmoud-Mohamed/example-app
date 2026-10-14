<?php

namespace App\Http\Requests;

use App\Helpers\ApiResponse;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Override;

class StoreServiceRequest extends FormRequest
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
        return [
            'title' => [
                'required',
                'max:255',
                Rule::unique('services', 'title')->ignore($this->route('service')),
            ],
            "details" => "required",
            'image' => [
                $this->isMethod('post') ? 'required' : 'nullable',
                'file',
                'max:2048'
            ],
        ];
    }
}
