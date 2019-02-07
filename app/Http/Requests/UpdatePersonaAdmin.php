<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonaAdmin extends FormRequest
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
          'nombres' => 'required|max:255',
          'apellidos' => 'required|max:255',
          'email' => 'required|unique:persona,email,'.$this->route('administrativo').',id_persona',
          'fechanacimiento' => 'required|max:255',
          'estado_civil' => 'max:255',
          'nacionalidad' => 'required|max:255',
          'profesion' => 'max:255',
          'dpi' => 'max:255',
          'direccion' => 'max:255',
          'telefono' => 'required|max:255',
          'telefono_dos' => 'max:255',
          'celular' => 'max:255',
          'foto' => 'mimes:jpeg,bmp,png',
        ];
    }
}
