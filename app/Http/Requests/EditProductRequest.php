<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
          'image' => 'mimes:jpeg,bmp,png',
          'promotion_price' => 'required',
          'unit_price' => 'required',
          'description' => ' required' ,
          'name_product' => 'required'
        ];
    }
}
