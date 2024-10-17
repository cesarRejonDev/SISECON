<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
                    'description' => ['required', 'string', 'max:255'],
                    'tag_id' => ['required'],
                ];
                break;
            case 'PUT':
                return [
                    'name' => ['required', 'string', 'max:255'],
                    'description' => ['required', 'string', 'max:255'],
                    'tag_id' => ['required'],
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'name' => 'El campo nombre es requerido.',
            'description' => 'El campo descripción es requerido.',
            'tag_id' => 'El campo tipo de cliente es requerido.',
        ];
    }
}
