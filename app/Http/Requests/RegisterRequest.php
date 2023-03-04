<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "name" => "required|string",
            "lastname" => "required|string",
            "username" => "required|unique:users",
            "email" => "required|unique:users,email|email",
            "password" => "required|min:6|confirmed",
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "El nombre es requerido.",
            "name.string" => "El nombre no es valido.",

            "lastname.required" => "El apellido es requerido.",
            "lastname.string" => "El apellido no es valido.",

            "username.required" => "El nombre de usuario es requerido.",
            "username.unique" => "El nombre de usuario que intenta utilizar ya fue registrado.",

            "email.required" => "El correo es requerido.",
            "email.unique" => "El correo que intenta utilizar ya fue registrado.",
            "email.email" => "El correo no es valido.",

            "password.required" => "La contraseña es requerida.",
            "password.password" => "La contraseña debe contener mas de 6 caracteres.",
            "password.confirmed" => "Confirme la contraseña.",
        ];
    }
}
