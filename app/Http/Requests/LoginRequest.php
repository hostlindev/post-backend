<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "email" => "required|email",
            "password" => "required|min:6",
        ];
    }

    public function messages()
    {
        return [
            "email.required" => "El correo es requerido.",
            "email.email" => "El correo no es valido.",

            "password.required" => "La contraseña es requeridad.",
            "password.min" => "La contraseña debe ser de más de 6 caracteres."
        ];
    }
}
