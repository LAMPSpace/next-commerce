<?php

namespace App\Http\Requests\HomeSetting;

use Illuminate\Foundation\Http\FormRequest;

class BaseHomeSettingRequest extends FormRequest
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
            'description' => ['nullable', 'string'],
            'background_image' => ['nullable', 'string'],
            'background_color' => ['nullable', 'string', 'max:30'],
            'banner_height' => ['required', 'integer', 'gte:100'],
            'banner_left_content' => ['nullable', 'boolean'],
            'banner_left_grid_lg' => ['nullable', 'integer', 'lte:4'],
            'banner_left_grid_md' => ['nullable', 'integer', 'lte:3'],
            'banner_main_type' => ['required', 'string', 'in:carousel,swiper'],
            'banner_main_pictures' => ['required'],
            'banner_main_pagination' => ['nullable', 'string', 'in:picture,title'],
            'banner_main_centered_slides' => ['nullable', 'boolean'],
            'banner_main_show_title' => ['nullable', 'boolean'],
            'banner_right_content' => ['nullable'],
            'banner_right_grid_lg' => ['nullable', 'integer', 'lte:3'],
            'content' => ['nullable']
        ];
    }
}
