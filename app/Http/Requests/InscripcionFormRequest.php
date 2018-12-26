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
          'id_plan' => 'required|integer',
          'id_persona' => 'required|integer',
          'cuota' => 'required|numeric',
          'id_grado' => 'required|integer'
        ];
    }
}
