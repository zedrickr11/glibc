<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlumnoFormRequest extends FormRequest
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
          'id_persona' => 'required|integer',
          'primer_nombre' => 'required|string|max:200',
          'segundo_nombre' => 'nullable|string|max:200',
          'tercer_nombre' => 'nullable|string|max:200',
          'primer_apellido' => 'required|string|max:200',
          'segundo_apellido' => 'nullable|string|max:200',
          'fechanacimiento' => 'required|date',
          'genero' => 'required|string|max:20',
          'telefono' => 'nullable|max:30',
          'direccion' => 'nullable|max:150',
          'foto' => 'nullable|file',
          'fe_edad' => 'nullable|file',
          'carnet' => 'nullable|integer',
          'codigo_alumno' => 'nullable|max:15'
        ];
    }
}
