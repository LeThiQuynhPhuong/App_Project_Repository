<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpDateGoiCreditRequest extends FormRequest
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
            'ten_goi'=>'required|max:100',
            'credit'=>'required|numeric|integer',
            'so_tien'=>'required|numeric|integer'
        ];
    }
    public function messages()
    {
        return [
            'ten_goi.required'=>'Nhập tên gói vào con zai',
            'ten_goi.max'=>'Tên gói không quá 100 ký tự',
            'credit.required' => 'Số credit không được rỗng',
            'credit.numeric' => 'Số credit không được là ký tự',
            'credit.integer' => 'Số credit phải là số nguyên',
            'so_tien.required' => 'Số tiền không được rỗng',
            'so_tien.numeric' => 'Số tiền không được là ký tự',
            'so_tien.integer' => 'Số tiền phải là số nguyên',
        ];
    }
}
