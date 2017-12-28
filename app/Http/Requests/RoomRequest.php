<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
          'name' => 'required|unique:rooms,name|min:3|max:8',
          'price'=> 'required|numeric',
          'image1'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
          'image2'=>'image|mimes:jpeg,png,jpg,gif,svg',
          'image3'=>'image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
}
