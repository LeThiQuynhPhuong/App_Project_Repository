<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpDateNguoiChoiRequest extends FormRequest
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
            return [
            'email'=>'required|email',
            'hinh_dai_dien'=>'image|mimes:jpeg,png,jpg,gif',
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'Email không được rỗng',
            'email.email'=>'Email không đúng định dạng',
            'hinh_dai_dien.image' => 'Yêu cầu phải là ảnh',
            'hinh_dai_dien.mimes'=> 'Không đúng định dạng ảnh',
        ];
    }
}
