<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActividadFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'nombre' => 'required|max:255',
          'descripcion' => 'max:255',
          'valor_nota' => 'required|numeric',
          'fecha' => 'date',
          'id_tipo_actividad' => 'numeric',
          'id_asignacion_curso' => 'numeric',
          'id_unidad' => 'numeric',
          'anio' => 'numeric',
        ];
    }
}
