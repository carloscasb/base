<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\EventoPessoa;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class EventoPessoaController extends Controller
{
    //

    protected $evento, $pessoa, $repository;

    public function __construct(Evento $evento, Pessoa $pessoa, EventoPessoa $eventopessoa )
    {
        $this->evento = $evento;
        $this->pessoa = $pessoa;
        $this->repository= $eventopessoa;

      //  $this->middleware(['can:evento']);
    }

    public function pessoas($idEvento)
    {

dd('estou aqui');



    }
 
    public function pessoasAvailable(Request $request, $idEvento)
    {
        if (!$evento = $this->evento->find($idEvento)) {
            return redirect()->back();
        }
 
      // $filters = $request->except('_token');
 
      // $pessoas = $ovento->pessoasAvailable($request->filter);
 
       // $pessoas = $this->pessoa->All();
       $pessoas = $this->pessoa->paginate();
 
        return view('admin.pages.eventos.pessoas.acesso', compact('evento', 'pessoas', 'filters'));
    }

            public function attachPessoaEvento(Request $request, EventoPessoa $eventopessoa )
            { 
               //   $eventopessoa->evento_id = $request->evento_id;
           // $eventopessoa->pessoa_id = $request->pessoa_id;
            
         // $eventopessoa->save();
        
        /*
        $eventopessoa ->name = $request->name;
        $eventopessoa ->save();
    */ 

       $eventopessoa->create($request->all());
       return redirect()->route('eventos.index');

            }

            public function create()
            {
                return view('admin.pages.eventos.pessoas.acesso');
               
            }
            public function store(Request $request)
            {
                dd('Estou aqui em:');
            }


}
