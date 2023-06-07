<?php

namespace App\Http\Requests\HomeSetting;

use Illuminate\Validation\Rule;

class UpdateHomeSettingRequest extends BaseHomeSettingRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'id' => $this->route('home_setting'),
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
            'name' => ['required_unless:name,null', 'string', ' max:128', Rule::unique('home_settings', 'name')->whereNot('id', $this->id)],
            'start_date' => ['required_unless:start_date,null', 'date'],
            'end_date' => ['required_unless:end_date,null', 'date', 'after_or_equal:start_date'],
            'banner_height' => ['required_unless:banner_height,null', 'integer', 'gte:100'],
            'banner_main_type' => ['required_unless:banner_main_type,null', 'string', 'in:carousel,swiper'],
            'banner_main_pictures' => ['required_unless:banner_main_pictures,null'],
        ];
    }
}
