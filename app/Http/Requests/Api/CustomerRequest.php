<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'payload.customer.first_name' => 'required',
            'payload.customer.last_name' => 'required',
            'payload.customer.email' => 'required|email|unique:customers,email',
            'payload.customer.phone' => 'nullable',
            'payload.customer.address' => 'nullable',
            'payload.customer.city' => 'nullable',
            'payload.customer.state' => 'nullable',
            'payload.customer.zip' => 'nullable',
            'payload.customer.country' => 'nullable',
            'payload.customer.company' => 'nullable',
        ];
    }
}
