<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    //

    // CAMPOS QUE PODEM SER PREENCHIDOS
    protected $fillable = ['name', 'url', 'nascimento', 'tipo', 'status',  'description'];


// RELACIONAMENTO COM PESSOA (pessoa) - ESSA SER OS PESSOASPOSSIVEL NUM EventoO
public function pessoas() {
    return $this->belongsToMany(Pessoa::class);
} 




    //USAMOS O PAGINATE
// FILTRO QUE SERA USADO NO METODO Search do EventoController 
    public function search($filter = null) {

        $results = $this->where('name' , 'LIKE', "%{$filter}%" )
                        ->orwhere('description' , 'LIKE', "%{$filter}%" )
                        ->paginate(1);
        return $results ;                
}




}
