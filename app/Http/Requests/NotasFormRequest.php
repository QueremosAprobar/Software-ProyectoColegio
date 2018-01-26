<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotasFormRequest extends FormRequest
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
            'idcurso'=>'required|min:10',
            'dnialumno'=>'required|min:8',
            'p1'=>'required|min:4',
            'p2'=>'required|min:4',
            'p3'=>'required|min:4',
            'promedio'=>'required|min:4',
        ];
    }
}
