<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDinamicoPut extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'nombre' => 'required|string|min:5|max:50',
            // 'facultad_id' => 'exists:facultades,id', // Validar la relación con la facultad

            'observacion' => 'required|string',
            'descripcion' => 'required|string',
            'porcentaje_auditoria' => 'required|numeric|min:0|max:100',
        ];
    }
}