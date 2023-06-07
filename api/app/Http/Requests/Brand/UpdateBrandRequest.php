<?php

namespace App\Http\Requests\Brand;

use App\Http\Requests\Brand\BaseBrandRequest;
use Illuminate\Validation\Rule;

class UpdateBrandRequest extends BaseBrandRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'id' => $this->route('brand'),
        ]);
    }

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
        return parent::rules() + [
            'name' => ['nullable', 'string', 'max:512', 'unique:brands,name'],
            'phone_number' => ['nullable', 'string', 'max:30', Rule::unique('brands', 'phone_number')->whereNot('id', $this->id)],
            'email' => ['nullable', 'string', 'max:512', Rule::unique('brands', 'email')->whereNot('id', $this->id)],
            'address' => ['nullable', 'string', 'max:512', Rule::unique('brands', 'address')->whereNot('id', $this->id)],
        ];
    }
}
