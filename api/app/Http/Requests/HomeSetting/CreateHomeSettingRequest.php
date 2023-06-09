<?php

namespace App\Http\Requests\HomeSetting;

use Carbon\Carbon;

class CreateHomeSettingRequest extends BaseHomeSettingRequest
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
            'name' => ['required', 'string', ' max:128', 'unique:home_settings,name'],
            'start_date' => ['required', 'date', 'after:' . Carbon::yesterday('Asia/Ho_Chi_Minh')],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
        ];
    }
}
