<?php

namespace App\Modules\Account\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'bail|required|min:2',
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
            'roles' => 'required|min:1'
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
        
            'name.required' => 'A name is required',
            'username.required' => 'A username is required',
            'password.required' => 'A password is required',
            'roles.required' => 'A roles is required',
        ];
    }
}
