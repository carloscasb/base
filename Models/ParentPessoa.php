<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentPessoa extends Model
{
    //
    // CAMPOS QUE PODEM SER PREENCHIDOS
    protected $fillable = ['name', 'parent_id', 'pessoa_id'];


    // RELACIONAMENTO COM Pessoa   ----- UMA Parent SÓ PODE PERTENCER UMA Oessoa 
            
        public function pessoas() {
        return $this->belongsToMany(Pessoa::class);
}
}