<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'name' => 'required',
            'mail' => 'required|email',
            'address' => 'required',
            'phone' => 'required|min:10|numeric',
        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'Nhập tên khách hàng',
            'mail.required' => 'Nhập email',
            'mail.email' => 'Nhập đúng email',
            'address.required' => 'Nhập địa chỉ',
            'phone.required' => 'Nhập số điện thoại',
            'phone.min' => 'Nhập đúng số điện thoại',
            'phone.numberic' => 'Nhập đúng số điện thoại',

        ];
    }
    public function attributes()
    {
        return[
            'name' => 'tên',
            'address' => 'đía chỉ',
            'phone' => 'số điện thoại',

        ];
    }
}
