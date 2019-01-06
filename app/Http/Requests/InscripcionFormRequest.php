<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InscripcionFormRequest extends FormRequest
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
          'id_alumno' => 'required|integer',
          'id_ciclo' => 'required|integer',
          'id_grado' => 'required|integer',
          'id_plan' => 'required|integer',
          'id_persona' => 'required|integer',
          'pago_inscripcion' => 'nullable|numeric',
          'cuota' => 'required|numeric'
        ];
    }
}
