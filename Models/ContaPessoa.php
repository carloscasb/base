<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContaPessoa extends Model
{
    protected $table = 'contas_pessoa';
    protected $fillable = [ 'banco', 'agencia','conta'];

    // RELACIONAMENTO COM PESSOAS   ----- UMA CONTA SÓ PODE PERTENCER UMA PESSOA 
   
    public function pessoa() {
        return $this->belongsTo(Pessoa::class);
}   

}
