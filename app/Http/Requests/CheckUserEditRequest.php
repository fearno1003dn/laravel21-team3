<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;

class CheckUserEditRequest extends FormRequest
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
        $users = $this->route('user');
        return [
          'fisrt_name' => 'min:3|max:8|unique:users,first_name,'.$users->id,
          'last_name' => 'required|min:3|max:8|unique:users,last_name,'.$users->id,
          'email' => 'required||email|unique:users,email,'.$users->id,
          'address' => 'required',
          'phone_number' => 'required|numeric|min:10000000|max:99999999999',
        ];
    }
}
