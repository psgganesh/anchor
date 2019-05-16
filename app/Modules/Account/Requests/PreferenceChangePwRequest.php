<?php

namespace App\Modules\Account\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PreferenceChangePwRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'current_password' => 'required|oldpassword_same|string|min:6',
            'new_password' => 'required|string|min:6|confirmed',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'current_password.required' => 'A current password is required',
            'new_password.required' => 'A new password is required',
        ];
    }
}
