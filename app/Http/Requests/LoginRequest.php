<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:6|max:300',
            'g-recaptcha-response'  =>  'required|captcha',
        ];
    }

    public function messages()
    {
        return [
            'email.email'             =>  'Email không đúng định dạng',
            'email.unique'            =>  'Email đã tồn tại',
            'password.*'              =>  'Mật khẩu phải từ 6 đến 30 ký tự',
            'g-recaptcha-response.*'  =>  'Vui lòng phải chọn vào recaptcha',
        ];
    }
}
