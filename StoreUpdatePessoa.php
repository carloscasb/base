<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePessoa extends FormRequest
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
            'name' => "required|min:3|max:255|unique:pessoas,name,{$id},id",
            'vulgo'=> 'required|min:3|max:255',                               //  |regex:/^\d+(\.\d{1,2})?$/'
           
            'mae' => 'required|min:3|max:255',  
            'genero' => 'required|min:3|max:255',  
            'rg' => 'required|min:3|max:255',  
            'exp' => 'required|min:3|max:255',  
            'cpf' => 'required|min:11|max:255',  
            'situa' => 'required|min:3|max:255',  
            'nasc' => 'required|min:3|max:255',  
           

        ];
    }
}


