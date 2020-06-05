<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    //
    private $repository; 
      
    public function __construct(Pessoa $pessoa)
    {
        $this->repository= $pessoa;
     }
    public function index()
     {
             $pessoas = $this->repository->all();
         return view('admin.pages.pessoas.index', [
             'pessoas' => $pessoas,
             ]);
     }
}

