<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpadeContaPessoa;
use App\Http\Requests\StoreUpdatePessoa;
use App\Models\ContaPessoa;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class ContaPessoaController extends Controller
{
    // REPOSITORIO COM ATRIBUTO $ContaPessoa (Model--OBJETO Contapessoa) e $pessoa (Model- OBJETO Pessoa)
    private $repository, $pessoa;

    public function __construct(ContaPessoa $contapessoa, Pessoa $pessoa )
       {
           $this->repository= $contapessoa;
           $this->pessoa = $pessoa;
        }

        public function index($idPessoa)
        {
              If(!$pessoa = $this->pessoa->where ('id', $idPessoa)->first()) {         //SE NÃo ACHOU (recuperando pela url)
                return redirect()->back();
            }                                                                   //SE ACHOU (recuperando pela url)
                     
              // $contas = $pessoa->contas();
              $contas = $pessoa->contas()->paginate(); 
              
            return view('admin.pages.pessoas.contas.index', [
                'pessoa' => $pessoa,
                'contas'=> $contas,

                ]);
                
            }  

            public function create($idPessoa)
            {
                if (!$pessoa = $this->pessoa->where('id', $idPessoa)->first()) {
                    return redirect()->back();
                }
        
                return view('admin.pages.pessoas.contas.create', [
                    'pessoa' => $pessoa,
                ]);
            }


             // ERREI O NOME NA HORA DE FAZER O REQUESTE MAIS O CERTO SERIA StoreUpdateContaPessoa


             public function store(StoreUpadeContaPessoa $request, $idPessoa)
       // public function store(Request $request, $idPessoa )
        {
            if (!$pessoa = $this->pessoa->where('id', $idPessoa)->first()) {
                return redirect()->back();
            }
    
            // $data = $request->all();
            // $data['pessoa_id'] = $pessoa->id;
            // $this->repository->create($data);
            $pessoa->contas()->create($request->all());
    
            return redirect()->route('contas.pessoa.index', $pessoa->id);
        }

        public function edit($idPessoa, $idConta)
        {
            $pessoa = $this->pessoa->where('id', $idPessoa)->first();
            $conta = $this->repository->find($idConta);
    
            if (!$pessoa || !$conta) {
                return redirect()->back();
            }
    
            return view('admin.pages.pessoas.contas.edit', [
                'pessoa' => $pessoa,
                'conta' => $conta,
            ]);
        }


        // public function update(Request $request, $idPessoa, $idConta)
        public function update(StoreUpadeContaPessoa $request, $idPessoa, $idConta)
        {
            $pessoa = $this->pessoa->where('id', $idPessoa)->first();
            $conta = $this->repository->find($idConta);
    
            if (!$pessoa || !$conta) {
                return redirect()->back();
            }
    
            $conta->update($request->all());
    
            return redirect()->route('contas.pessoa.index', $pessoa->id);
        }
    

        public function show($idPessoa, $idConta)
        {
            $pessoa = $this->pessoa->where('id', $idPessoa)->first();
            $conta = $this->repository->find($idConta);
    
            if (!$pessoa || !$conta) {
                return redirect()->back();
            }
    
            return view('admin.pages.pessoas.contas.show', [
                'pessoa' => $pessoa,
                'conta' => $conta,
            ]);
        }
    
    
        public function destroy($idPessoa, $idConta)
        {
            $pessoa = $this->pessoa->where('id', $idPessoa)->first();
            $conta = $this->repository->find($idConta);
    
            if (!$pessoa || !$conta) {
                return redirect()->back();
            }
    
            $conta->delete();
    
            return redirect()
                        ->route('contas.pessoa.index', $pessoa->id)
                        ->with('message', 'Registro detalado com sucesso');

                        
        }

}
