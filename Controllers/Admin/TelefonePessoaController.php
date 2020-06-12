<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateTelefonePessoa;
use App\Models\Pessoa;
use App\Models\TelefonePessoa;
use Illuminate\Http\Request;

class TelefonePessoaController extends Controller
{
    //

    private $repository, $pessoa;

    public function __construct(TelefonePessoa $telefonepessoa, Pessoa $pessoa )
       {
           $this->repository= $telefonepessoa;
           $this->pessoa = $pessoa;
        }

        public function index($idPessoa)
        {
              If(!$pessoa = $this->pessoa->where ('id', $idPessoa)->first()) {         //SE NÃo ACHOU (recuperando pela url)
                return redirect()->back();
              }                                                                   //SE ACHOU (recuperando pela url)
                     
              // $telefones = $pessoa->telefones();
              $telefones = $pessoa->telefones()->paginate(); 
              
            return view('admin.pages.pessoas.telefones.index', [
                'pessoa' => $pessoa,
                'telefones'=> $telefones,

                ]);
            }
        
            public function create($idPessoa)
            {
                if (!$pessoa = $this->pessoa->where('id', $idPessoa)->first()) {
                    return redirect()->back();
                }
        
                return view('admin.pages.pessoas.telefones.create', [
                    'pessoa' => $pessoa,
                ]);
            }


            public function store(StoreUpdateTelefonePessoa $request, $idPessoa)
             // public function store(Request $request, $idPessoa )
           
        {
            if (!$pessoa = $this->pessoa->where('id', $idPessoa)->first()) {
                return redirect()->back();
            }
    
            // $data = $request->all();
            // $data['pessoa_id'] = $pessoa->id;
            // $this->repository->create($data);
            $pessoa->telefones()->create($request->all());
    
            return redirect()->route('telefones.pessoa.index', $pessoa->id);
        }

        public function edit($idPessoa, $idTelefone)
        {
            $pessoa = $this->pessoa->where('id', $idPessoa)->first();
            $telefone = $this->repository->find($idTelefone);
    
            if (!$pessoa || !$telefone) {
                return redirect()->back();
            }
    
            return view('admin.pages.pessoas.telefones.edit', [
                'pessoa' => $pessoa,
                'telefone' => $telefone,
            ]);
        }


       // public function update(Request $request, $idPessoa, $idTelefone)
         public function update(StoreUpdateTelefonePessoa $request, $idPessoa, $idTelefone)
        {
            $pessoa = $this->pessoa->where('id', $idPessoa)->first();
            $telefone = $this->repository->find($idTelefone);
    
            if (!$pessoa || !$telefone) {
                return redirect()->back();
            }
    
            $telefone->update($request->all());
    
            return redirect()->route('telefones.pessoa.index', $pessoa->id);
        }


        public function show($idPessoa, $idTelefone)
        {
            $pessoa = $this->pessoa->where('id', $idPessoa)->first();
            $telefone = $this->repository->find($idTelefone);
    
            if (!$pessoa || !$telefone) {
                return redirect()->back();
            }
    
            return view('admin.pages.pessoas.telefones.show', [
                'pessoa' => $pessoa,
                'telefone' => $telefone,
            ]);
        }
    
    
        public function destroy($idPessoa, $idTelefone)
        {
            $pessoa = $this->pessoa->where('id', $idPessoa)->first();
            $telefone = $this->repository->find($idTelefone);
    
            if (!$pessoa || !$telefone) {
                return redirect()->back();
            }
    
            $telefone->delete();
    
            return redirect()
                        ->route('telefones.pessoa.index', $pessoa->id)
                        ->with('message', 'Registro detalado com sucesso');

                        
        }

}
