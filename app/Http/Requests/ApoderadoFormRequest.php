<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApoderadoFormRequest extends FormRequest
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
            //
            'nombre'=>'requied|min:3',
            'apellido'=>'requied|min:3',
            'direccion'=>'requied|min:3',
            'telefono'=>'requied|min:3',
        ];
    }
}
