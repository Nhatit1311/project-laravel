<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'password'              =>  'required|min:6|max:30',
            're_password'           =>  'required|same:password',
            'hash_reset'            =>   'required|exists:customers,hash_reset',
        ];
    }

    public function messages()
    {
        return [
            'password.*'              =>  'Mật khẩu phải từ 6 đến 30 ký tự',
            're_password.*'           =>  'Mật khẩu nhập lại không giống',
            'hash_reset.*'            =>   'Liên kết không tồn tại'
        ];
    }
}
