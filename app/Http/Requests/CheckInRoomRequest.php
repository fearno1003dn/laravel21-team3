<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckInRoomRequest extends FormRequest
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
        //$bookroom = $this->route('bookroom');
        return [
            'full_name' => 'required',
            'passport' => 'required|numeric|min:100000000|max:999999999',
            'phone_number' => 'required|numeric|min:10000000|max:99999999999'
        ];
    }
}
