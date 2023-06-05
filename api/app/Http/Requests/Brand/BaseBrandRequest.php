<?php

namespace App\Http\Requests\Brand;

use Illuminate\Foundation\Http\FormRequest;

class BaseBrandRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'discount_id' => ['nullable', 'exists:discounts,id'],
            'name' => ['required', 'string', 'unique:brands,name'],
            'logo' => ['nullable', 'max:50'],
            'phone_number' => ['required', 'max:30', 'unique:brands,phone_number'],
            'email' => ['required', 'max:512', 'unique:brands,email'],
            'address' => ['required', 'max:512', 'unique:brands,address'],
            'status' => ['nullable', 'in:1,2'],
        ];
    }
}
