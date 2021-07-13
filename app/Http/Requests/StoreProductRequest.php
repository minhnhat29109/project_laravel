<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
                'name' => 'required|min:10|max:255',
                'origin_price' => 'required|numeric',
                'sale_price' => 'required|numeric',
                'content' => 'required',
                'images' => 'required|max:10000000000',
                'color' => 'required',
                'size' => 'required',
                'amount' => 'required'

        ];

    }
    public function messages()
    {
        return[
            'name.required' => 'Nhập tên sản phẩm!',
            'name.min' => 'Tên sản phẩm ít nhát 10 kí tự',
            'origin_price.required' => 'Nhập giá gốc sản phẩm!',
            'origin_price.numeric' => 'Giá sản phẩm là số!',
            'sale_price.required' => 'Nhập giá bán sản phẩm!',
            'sale_price.numeric' => 'Giá sản phẩm là số!',
            'content.required' => 'Nhập thông tin sản phẩm!',
            'images.required' => 'Chưa nhập ảnh sản phẩm!',
            'images.file' => 'Chọn file là ảnh!',
            'images.mimes' => 'Chọn file là ảnh!',
            'images.max' => 'Kích thước ảnh quá lớn!',
            'color.require' => 'Thêm màu sản phẩm',
            'size.require' => 'Thêm size',
            'amount.require' => 'Nhập số lượng',
        ];
    }
    public function attributes()
    {
        return[
            'name' => 'tên',
            'origin_price' => 'giá',
            'content' => 'nội dung',
            'images' => 'ảnh',
            'status' => 'trạng thái',
        ];
    }
}
