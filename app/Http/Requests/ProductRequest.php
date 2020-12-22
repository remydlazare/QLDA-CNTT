<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'sltParent' =>'required',
            'txtName' => 'required|unique:products,name',
            'fImages' => 'required|image',
            'SizeAddDetail'=>'required'
        ];
    }
    public function messages() {
        return [
            'sltParent.required' => 'Please Choose Category!',
            'txtName.required' => 'Please Enter Product Name!',
            'txtName.unique' => 'This Name Product Is Exist!',
            'fImages.required'  => 'Please Choose Images!',
            'fImages.image' => 'This Is Not Image File!',
            'SizeAddDetail.required'=> 'Vui lòng nhập Size',
            // 'SizeAddDetail.integer' => 'Size phải là kiểu số',
            // 'SizeAddDetail.min'=>'Size nhỏ nhất là 38',
            // 'SizeAddDetail.max'=>'Size lớn  nhất là 42'
        ];
    } 
}
