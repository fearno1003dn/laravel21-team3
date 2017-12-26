<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckRoomTypeEditRequest extends FormRequest
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
      $roomTypes = $this->route('roomTypes');
      return [
          'name' => 'required|min:3|max:8|unique:room_types,name,'.$roomTypes->id,
      ];
    }
}
