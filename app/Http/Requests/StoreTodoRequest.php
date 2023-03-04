<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTodoRequest extends FormRequest
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
            "title" => "required|string|max:30",
            "description" => "required|string|max:255",
            "status" => "sometimes"
        ];
    }

    public function messages()
    {
        return [
            "title.required" => "El título es requerido.",
            "title.string" => "El título solo de contener caracteres.",
            "title.max" => "El título solo puede contener maximo 30 caracteres.",

            "description.required" => "La descripción es requerida.",
            "description.string" => "La descripción solo puede contener caracteres.",
            "description.max" => "La descripción solo puede contener maximo 255 caracteres.",

            "status.sometimes" => "El estado de la tarea es requerido.",
        ];
    }
}
