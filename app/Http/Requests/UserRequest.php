<?php

namespace App\Http\Requests;

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
            'fisrt_name' => 'required|min:3|max:8',
            'last_name' => 'required|min:3|max:8',
            'email' => 'required||email|unique:user,email|',
            'password' => 'required|unique:user,password|min:3|max:8',
            'address' => 'required',
            'phone_number' => 'required|numeric|min:10|max:11',

        ];
    }
}
