<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'name' => ['required', 'string', 'max:255'],
                    'paternal_last_name' => ['required', 'string', 'max:255'],
                    'maternal_last_name' => ['max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'string', 'min:8'],
                    'roles' => ['required'],
                ];
                break;
            case 'PUT':
                return [
                    'name' => ['required', 'string', 'max:255'],
                    'paternal_last_name' => ['required', 'string', 'max:255'],
                    'maternal_last_name' => ['max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$this->user->id],
                    'roles' => ['required'],
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'name' => 'El campo nombre es requerido.',
            'name.max' => 'El campo nombre es demasiado largo.',
            'paternal_last_name.required' => 'El campo apellido paterno es requerido.',
            'paternal_last_name.max' => 'El campo apellido paterno es demasiado largo.',
            'maternal_last_name.max' => 'El campo apellido materno es demasiado largo.',
            'email.unique' => 'Este correo electrónico ya ha sido registrado con anterioridad.',
            'password' => 'El campo contraseña debe tener un mínimo de 8 caracteres.',
            'roles' => 'El campo rol es requerido.',
        ];
    }
}
