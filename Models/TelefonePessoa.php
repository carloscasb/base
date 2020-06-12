<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TelefonePessoa extends Model
{
    //

    protected $table = 'telefones_pessoa';          //     MODIFICAMOS O NOME DA TABELA AQUI (opcional)
    protected $fillable = [ 'numero','description'];


      // RELACIONAMENTO COM PESSOAS   ----- UMA Telefone SÓ PODE PERTENCER UMA PESSOA 
   
      public function pessoa() {
        return $this->belongsTo(Pessoa::class);
}   

}
