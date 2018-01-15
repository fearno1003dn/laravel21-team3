<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckRoomSizeEditRequest extends FormRequest
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
      $roomSizes = $this->route('roomSize');
      return [
          'name' => 'required|min:3|max:80|unique:room_sizes,name,'.$roomSizes->id,
          'size' => 'required|numeric',
      ];
    }
}
