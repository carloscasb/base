<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orcrim extends Model
{
    //
    protected $fillable = ['name', 'url', 'estado', 'sigla',  'description'];


    // RELACIONAMENTO DA ORCRIM COM AS PESSOA (pessoa) - ESSA SER OS PESSOASPOSSIVEL NUM OrcrimO
    public function pessoas() {
        return $this->belongsToMany(Pessoa::class);
    } 


     // RELACIONAMENTO COM Membro   ----- UMA ORCRIM PODE TER VARIAS MembroS

     public function membros() {
        return $this->hasMany(MembroOrcrim::class);
}   

    public function search($filter = null) {

        $results = $this->where('name' , 'LIKE', "%{$filter}%" )
                        ->orwhere('description' , 'LIKE', "%{$filter}%" )
                        ->paginate(1);
        return $results ;                
}


    //      Pessoas NÃO DISPONIVEIS PARA  orcrim
     
    public function pessoasAvailable($filter = null)
    {
        $pessoas = Pessoa::whereNotIn('pessoas.id', function($query) {
            $query->select('orcrim_pessoa.pessoa_id');
            $query->from('orcrim_pessoa');
            $query->whereRaw("orcrim_pessoa.orcrim_id={$this->id}");
        })
        ->where(function ($queryFilter) use ($filter) {
            if ($filter)
                $queryFilter->where('pessoas.name', 'LIKE', "%{$filter}%");
        })
        ->paginate();

        return $pessoas;
    }

}
