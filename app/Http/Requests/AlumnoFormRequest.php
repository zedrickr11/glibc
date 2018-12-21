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
          'primer_nombre' => 'required|string',
          'segundo_nombre' => 'nullable|string',
          'tercer_nombre' => 'nullable|string',
          'primer_apellido' => 'required|string',
          'segundo_apellido' => 'nullable|string',
          'fechanacimiento' => 'required|date',
          'genero' => 'required|string',
          'telefono' => 'nullable',
          'direccion' => 'nullable',
          'foto' => 'nullable|file',
          'fe_edad' => 'nullable|file'
        ];
    }
}
