<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEstandarPut extends FormRequest
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
            'dimension' => 'string|max:255',
            'factor' => 'string|max:255',
            'estandar' => 'string|max:255',
            'escala_avance' => 'string|max:255',
            'contextualizacion' => 'string|max:255',
            'identificacion_brechas' => 'required|string|max:255',
            'actividades' => 'string|max:255',
            'otros_estandares' => 'string|max:255',
            'avance' => 'string|max:255',
            'sustentacion' => 'string|max:255',
            'comentario' => 'string|max:255',
            'recomendacion' => 'string|max:255',

        ];
    }
}