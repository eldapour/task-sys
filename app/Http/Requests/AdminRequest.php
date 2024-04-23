<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminRequest extends FormRequest
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
            'email'     => 'required|email|unique:admins,email,'.$this->id,
            'name'      => 'required',
            'password'  => 'required_without:id'.request()->isMethod('put') ? '' : '|min:6',
        ];
    }

    public function messages()
    {
        return [
            'name.required'              => 'يجب ادخال الاسم',
            'email.required'             => 'يجب ادخال الإيميل',
            'email.unique'               => 'الإيميل مستخدم من قبل',
            'email.email'               => 'الإيميل غير صحيح',
            'password.required_without'  => 'يجب ادخال كلمة مرور',
            'password.min'               => 'الحد الادني لكلمة المرور : 6 أحرف',
        ];
    }
}
