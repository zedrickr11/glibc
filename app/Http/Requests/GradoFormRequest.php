<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GradoFormRequest extends FormRequest
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
          'nombre' => 'required|string',
          'descripcion' => 'nullable|string',
          'id_persona' => 'required|integer',
          'id_carrera' => 'required|integer',
          'id_seccion' => 'required|integer'
        ];
    }
}
