<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ObraRequest extends FormRequest
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
            'codigo' => ['required', 'string', 'max:7'],
            'descripcion' => ['required', 'string', 'max:255'],
            'cliente_id' => ['required', 'int'],
            'total' => ['required', 'numeric', 'min:1'],
            'cobrado' => ['nullable', 'numeric'],
        ];
    }

    /** Mensajes propios, por campo y regla. */
    public function messages(): array
    {
        return [
            'codigo.required' => 'El codigo de la obra es obligatorio.',
            'descripcion.required' => 'La descripcion de la obra es obligatorio.',
            'cliente_id.required' => 'El cliente de la obra es obligatorio.',
            'total.required' => 'El total de la obra debe ser mayor a 0',
        ];
    }

    /** Cómo se llama cada campo en los mensajes que no personalizamos. */
    public function attributes(): array
    {
        return [
            'codigo' => 'codigo',
            'descripcion' => 'descripcion',
            'cliente_id' => 'cliente_id',
            'total' => 'total',
            'cobrado' => 'cobrado',
        ];
    }
}
