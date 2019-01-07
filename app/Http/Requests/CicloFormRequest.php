<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CicloFormRequest extends FormRequest
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

          'anio' => 'required|numeric',
          'fecha_inicio' => 'required|date',
          'fecha_fin' => 'required|date',
          'nombre' => 'required|max:255',
        ];
    }
}
