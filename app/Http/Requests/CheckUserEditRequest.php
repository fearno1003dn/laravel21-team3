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
        $user = $this->route('user');
        return [
          'fisrt_name' => 'required|min:3|max:8',
          'last_name' => 'required|min:3|max:8',
          'email' => 'required||email|unique:users,email,'.$user->id,
          'address' => 'required',
          'phone_number' => 'required|numeric',
        ];
    }
}
