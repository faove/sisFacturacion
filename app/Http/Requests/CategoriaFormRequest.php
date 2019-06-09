<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest; //esta class extends a FormRequest lo quite para hacer una prueba

//use sisFacturacion\Http\Requests\Request;

class CategoriaFormRequest extends FormRequest
{
    /** FormRequest
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
            'nombre'=>'required|max:50',
            'descripcion' =>'max:256',
        ];
    }
}
