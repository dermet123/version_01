<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreModeloPost extends FormRequest
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

            'fecha_cracion' => 'required|date',
            'cantidad_estandar' => 'required|min:0',
            'fecha_vigencia' => 'required|date|after_or_equal:fecha_cracion',
        ];
    }
}