<?php

namespace App\Http\Requests\EndUser;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
public function rules(): array
{
    return [
        'billing_first_name' => ['required', 'string', 'max:100'],
        'billing_last_name' => ['required', 'string', 'max:100'],
        'billing_country' => ['required', 'string'],
        'billing_address' => ['required', 'string', 'max:255'],
        'billing_city' => ['required', 'string', 'max:100'],
        'billing_postal_code' => ['required', 'string', 'max:20'],
        'billing_email' => ['required', 'email'],
        'billing_phone' => ['required', 'string', 'max:20'],
        'billing_company_name' => ['nullable', 'string', 'max:150'],
        'notes' => ['nullable', 'string', 'max:1000'],
    ];
}
}
