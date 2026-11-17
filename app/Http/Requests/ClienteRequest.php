<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => ['required', 'string', 'max:255'],
            'apellidos' => ['nullable', 'string', 'max:255'],
            'nif' => ['nullable', 'string', 'max:20', Rule::unique('clientes')->ignore($this->route('id'))],
            'direccion' => ['required', 'string', 'max:255'],
            'cod_postal' => ['nullable', 'string', 'max:10'],
            'telefono' => ['required', 'string', 'max:20'],
        ];
    }

    public function attributes(): array
    {
        return [
            'nombre' => 'nombre',
            'apellidos' => 'apellidos',
            'nif' => 'nif',
            'direccion' => 'dirección',
            'telefono' => 'teléfono',
            'cod_postal' => 'código postal',
        ];
    }
}
