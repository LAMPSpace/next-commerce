<?php

namespace App\Http\Requests\Category;

use App\Http\Requests\Category\BaseCategoryRequest;

class CreateCategoryRequest extends BaseCategoryRequest
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
        return parent::rules() + [
            'name' => ['required', 'string', 'max:128', 'unique:categories,name'],
        ];
    }
}
