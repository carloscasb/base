<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    // CAMPOS QUE PODEM SER PREENCHIDOS
    protected $fillable = ['name', 'url', 'vulgo', 'mae', 'genero', 'rg', 'exp', 'cpf', 'situa', 'nasc', 'description'];

        // RELACIONAMENTO COM Conta   ----- UMA PESSOA PODE TER VARIAS CONTAS

    public function contas() {
        return $this->hasMany(ContaPessoa::class);
}   


   // RELACIONAMENTO COM Telefone   ----- UMA PESSOA PODE TER VARIAS TELEFONES

   public function telefones() {
    return $this->hasMany(TelefonePessoa::class);
}   


    // FILTRO DE PESSOAS
    public function search($filter = null) {

        $results = $this->where('name' , 'LIKE', "%{$filter}%" )
                        ->orwhere('description' , 'LIKE', "%{$filter}%" )
                        ->paginate(1);
        return $results ;                
}



}
