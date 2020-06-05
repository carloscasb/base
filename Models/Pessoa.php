<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    //
    protected $fillable = ['name', 'url', 'vulgo', 'mae', 'genero', 'rg', 'exp', 'cpf', 'situa', 'nasc', 'description'];
}
