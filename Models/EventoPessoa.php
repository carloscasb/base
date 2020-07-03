<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventoPessoa extends Model
{
    //

     // CAMPOS QUE PODEM SER PREENCHIDOS
     protected $fillable = [ 'evento_id ' , 'pessoa_id'];


     // RELACIONAMENTO COM Pessoa   ----- UMA EVENTO SÓ PODE PERTENCER UMA Oessoa 
             
         public function pessoas() {
         return $this->belongsToMany(Pessoa::class);
 }

                                // RELACIONAMENTO COM Evento   ----- UMA EVENTO SÓ PODE PERTENCER UMA Oessoa 
                                            
                                public function eventos() {
                                    return $this->belongsToMany(Evento::class);
                                }

}
