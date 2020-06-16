<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateOrcrim extends FormRequest
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

        $id= $this->segment(3);   //Posição na id (endereço)
        return [
            //

            'name' => "required|min:3|max:255|unique:orcrims,name,{$id},id",
            'sigla'=> 'required|min:3|max:255',                               //  |regex:/^\d+(\.\d{1,2})?$/'
           
            'estado' => 'required|min:2|max:255',  
            'description' => "required|min:4|max:255", 
        ];
    }
}
