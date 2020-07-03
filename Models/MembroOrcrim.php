<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MembroOrcrim extends Model
{
    //

    protected $table = 'membros_orcrim';          //     MODIFICAMOS O NOME DA TABELA AQUI (opcional)
    protected $fillable = ['orcrim_id', 'name', 'func', 'lidera', 'quebrada', 'padrinho', 'databast', 'localbast', 'atua',  'description'];

            // RELACIONAMENTO COM orcrim   ----- UMA Membro SÓ PODE PERTENCER UMA ORCRIM 
            
            public function orcrim() {
                return $this->belongsTo(Orcrim::class);

            }
 }       