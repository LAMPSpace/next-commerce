<?php

namespace App\Http\Requests\Category;

use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends BaseCategoryRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'id' => $this->route('category'),
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
            'name' => ['required_unless:name,null', 'string', 'max:128', Rule::unique('categories', 'name')->whereNot('id', $this->id)],
        ];
    }
}
