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
            'name' => ['required_unless:name,null', 'string', 'max:512', Rule::unique('brands', 'name')->whereNot('id', $this->id)],
            'phone_number' => ['required_unless:phone_number,null', 'string', 'max:30', Rule::unique('brands', 'phone_number')->whereNot('id', $this->id)],
            'email' => ['required_unless:email,null', 'string', 'max:512', Rule::unique('brands', 'email')->whereNot('id', $this->id)],
            'address' => ['required_unless:address,null', 'string', 'max:512', Rule::unique('brands', 'address')->whereNot('id', $this->id)],
        ];
    }
}
