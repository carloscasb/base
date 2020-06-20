<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MembroOrcrim;
use App\Models\Orcrim;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class MenbroOrcrimController extends Controller
{
    //
   
    protected $orcrim, $pessoa, $repository;

    public function __construct(Orcrim $orcrim, Pessoa $pessoa, MembroOrcrim $membroorcrim  )
    {
        $this->orcrim = $orcrim;
        $this->pessoa = $pessoa;
        $this->repository= $membroorcrim;

      //  $this->middleware(['can:orcrims']);
    }

     //TENTAIVAS INSERIR

    
      
    
        
      

    public function create()
    {
        return view('admin.pages.orcrims.membros.acesso');
    }

     //  public function store(StoreUpdateProfile $request)
   public function store(Request $request, $idOrcrim )
   {
    if (!$orcrim = $this->orcrim->where('id', $idOrcrim)->first()) {
        return redirect()->back();
    
        $orcrim->membros()->create($request->all());
    
        return redirect()->route('orcrims.membros.acesso', $orcrim->id);
    }
      //   $this->repository->create($request->all());

       //  return redirect()->route('orcrims.membros.acesso');
   }


   // LISTAGEM DAS PESSOA DE UMA ORCRIM 

   public function pessoas($idOrcrim)
   {
       if (!$orcrim = $this->orcrim->find($idOrcrim)) {
           return redirect()->back();
       }

       $pessoas = $orcrim->pessoas()->paginate();

       return view('admin.pages.orcrims.membros.membros', compact('orcrim', 'pessoas'));
   }

// LISTAGEM das ORCRIM  DE UMA  PESSOA
   public function orcrims($idPessoa)
   {
       if (!$pessoa = $this->pessoa->find($idPessoa)) {
           return redirect()->back();
       }

       $orcrims = $pessoa->orcrims()->paginate();

       return view('admin.pages.pessoas.orcrims.orcrims', compact('pessoa', 'orcrims'));
   }

   //  VAMOS PEGAR TODOS com $this->pessoas->All(); ou paginate()  ---PESSOAS QUE PODEM ESTAR DISPONIVEIS
   public function pessoasAvailable(Request $request, $idOrcrim)
   {
       if (!$orcrim = $this->orcrim->find($idOrcrim)) {
           return redirect()->back();
       }

     // $filters = $request->except('_token');

     // $pessoas = $orcrim->pessoasAvailable($request->filter);

      // $pessoas = $this->pessoa->All();
      $pessoas = $this->pessoa->paginate();

       return view('admin.pages.orcrims.membros.acesso', compact('orcrim', 'pessoas', 'filters'));
   }

   public function attachPessoasOrcrim(Request $request, $idOrcrim)
   {
    
   
      
   }

        




}