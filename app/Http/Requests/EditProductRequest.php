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
           'code' => 'required|unique:products,code,'.$this->id,
           'name' => 'required|unique:products,name,'.$this->id,
           'price' =>'required|numeric',
       ];
    }

    public function messages()
    {
        return [
            'code.required' =>'Vui lòng nhập mã sản phẩm',
            'code.unique' =>'Không được trùng mã sản phẩm',
            'name.required' =>'Vui lòng nhập tên sản phẩm',
            'name.unique' =>'Không được trùng tên sản phẩm',
            'price.required' =>'Vui lòng nhập giá sản phẩm',
            'price.numeric' => 'Giá sản phẩm phải là dạng số',
        ];
    }
}