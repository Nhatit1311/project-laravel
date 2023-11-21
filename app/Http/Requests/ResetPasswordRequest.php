<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'email' => 'required|email|exists:customers,email',
            'g-recaptcha-response'  =>  'required|captcha',
        ];
    }

    public function messages()
    {
        return [
            'email.email'             =>  'Email không đúng định dạng',
            'email.exists'            =>  'Email không tồn tại',
            'g-recaptcha-response.*'  =>  'Vui lòng phải chọn vào recaptcha',
        ];
    }
}
