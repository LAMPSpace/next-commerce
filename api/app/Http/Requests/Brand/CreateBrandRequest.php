<?php

namespace App\Http\Requests\Brand;

use App\Http\Requests\Brand\BaseBrandRequest;

class CreateBrandRequest extends BaseBrandRequest
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
        return parent::rules() + [];
    }
}
