<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProveedorRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => ['required', 'string', 'max:255'],
            'direccion' => ['nullable', 'string', 'max:255'],
            'telefono' => ['nullable', 'string', 'max:255'],
            'tipo' => ['nullable', 'string', 'max:255'],
            'referencia' => ['nullable', 'string', 'max:255'],
            'documento' => ['nullable', 'string', 'max:255'],
            'num_documento' => ['nullable', 'string', 'max:255'],
            'correo' => ['nullable', 'email'],
        ];
    }

    /** Cómo se llama cada campo en los mensajes que no personalizamos. */
    public function attributes(): array
    {
        return [
            'nombre' => 'nombre',
            'direccion' => 'direccion',
            'telefono' => 'telefono',
            'tipo' => 'tipo',
            'referencia' => 'referencia',
            'documento' => 'documento',
            'num_documento' => 'numero documento',
            'correo' => 'correo',
            
        ];
    }
}
