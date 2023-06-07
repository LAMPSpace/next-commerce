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
            'discount_id' => ['nullable', 'integer', 'exists:discounts,id'],
            'description' => ['nullable', 'string'],
            'logo' => ['nullable', 'string', 'max:50'],
            'status' => ['nullable', 'integer', 'in:1,2'],
        ];
    }
}
