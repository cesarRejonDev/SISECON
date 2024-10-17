<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DutyTypesRequest extends FormRequest
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
                    'acronym' => ['required', 'string', 'max:10'],

                ];
                break;
            case 'PUT':
                return [
                    'name' => ['required', 'string', 'max:255'],
                    'acronym' => ['required', 'string', 'max:10'],
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'name' => 'El campo nombre es requerido.',
            'acronym' => 'El campo para acrónimo es requerido.',
        ];
    }
}
