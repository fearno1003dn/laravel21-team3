<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckServiceEditRequest extends FormRequest
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
      $services = $this->route('service');
      return [
          'name' => 'required|min:3|max:8|unique:services,name,'.$services->id,
          'price'=> 'required|numeric',
      ];
    }
}