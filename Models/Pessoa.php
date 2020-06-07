<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    //
    protected $fillable = ['name', 'url', 'vulgo', 'mae', 'genero', 'rg', 'exp', 'cpf', 'situa', 'nasc', 'description'];


    public function search($filter = null) {

        $results = $this->where('name' , 'LIKE', "%{$filter}%" )
                        ->orwhere('description' , 'LIKE', "%{$filter}%" )
                        ->paginate(1);
        return $results ;                
}



}
