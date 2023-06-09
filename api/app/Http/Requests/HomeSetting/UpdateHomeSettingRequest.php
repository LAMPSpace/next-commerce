<?php

namespace App\Http\Requests\HomeSetting;

use Illuminate\Validation\Rule;
use Carbon\Carbon;

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
            'start_date' => ['required_unless:start_date,null', 'date', 'after:' . Carbon::yesterday('Asia/Ho_Chi_Minh')],
            'end_date' => ['required_unless:end_date,null', 'date', 'after_or_equal:start_date'],
        ];
    }
}
