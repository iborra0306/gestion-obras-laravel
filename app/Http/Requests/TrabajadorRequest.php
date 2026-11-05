<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TrabajadorRequest extends FormRequest
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
            'apellido' => ['required', 'string', 'max:255'],
            'tipo' => ['nullable', 'string', 'max:255'],
            'telefono' => ['nullable', 'string', 'max:20'],
            'coste_hora_estandar' => ['required', 'numeric', 'min:0'],
        ];
    }

    /** Mensajes propios, por campo y regla. */
    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre del trabajador es obligatorio.',
            'apellido.required' => 'El apellido del trabajador es obligatorio.',
            'coste_hora_estandar.required' => 'El coste de hora estandar del trabajador es obligatorio.',
            'coste_hora_estandar.min' => 'El coste de hora estandar del trabajador debe ser mayor o igual a 0.',
        ];
    }

    /** Cómo se llama cada campo en los mensajes que no personalizamos. */
    public function attributes(): array
    {
        return [
            'nombre' => 'nombre',
            'apellido' => 'apellido',
            'tipo' => 'tipo',
            'telefono' => 'telefono',
            'coste_hora_estandar' => 'coste hora estandar',
        ];
    }
}
