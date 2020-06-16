<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContbancPessoa;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class ContbancPessoaController extends Controller
{
    //
    private $repository, $pessoa;

    public function __construct(ContbancPessoa $contbancpessoa, Pessoa $pessoa )
       {
           $this->repository= $contbancpessoa;
           $this->pessoa = $pessoa;
        }


        public function index($idPessoa)
        {
              If(!$pessoa = $this->pessoa->where ('id', $idPessoa)->first()) {         //SE NÃo ACHOU (recuperando pela id)
                return redirect()->back();
              }                                                                   //SE ACHOU (recuperando pela id)
                     
              // $contbancs = $pessoa->contbancs();
              $contbancs = $pessoa->contbancs()->paginate(); 
              
            return view('admin.pages.pessoas.contbancs.index', [
                'pessoa' => $pessoa,
                'contbancs'=> $contbancs,

                ]);
            }          

}
