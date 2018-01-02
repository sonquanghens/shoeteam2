<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequests extends FormRequest
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
          "name_receiver" => "required",
          "email" => "required",
          "adress" => "required",
          "phone" => "required|min:10|max:12",
        ];
    }

    public function messages()
    {
      return [
        'name_receiver.required' => 'Tên không được để trống',
        'email.required' => 'Email không được để trống',
        'adress.required' => 'Địa chỉ không được để trống',
        'phone.required' => 'Điện thoại không được để trống',
        'phone.min' => 'Điện thoại không được nhỏ hơn 10 kí tự',
        'phone.max' => 'Điện thoại không được lớn hơn 12 kí tự',
      ];
    }
}
