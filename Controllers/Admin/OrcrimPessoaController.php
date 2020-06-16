<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orcrim;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class OrcrimPessoaController extends Controller
{
    //

    protected $orcrim, $pessoa;

    public function __construct(Orcrim $orcrim, Pessoa $pessoa)
    {
        $this->orcrim = $orcrim;
        $this->pessoa = $pessoa;

      //  $this->middleware(['can:orcrims']);
    }

        // LISTAGEM DAS PESSOA DE UMA ORCRIM 

        public function pessoas($idOrcrim)
            {
                if (!$orcrim = $this->orcrim->find($idOrcrim)) {
                    return redirect()->back();
                }

                $pessoas = $orcrim->pessoas()->paginate();

                return view('admin.pages.orcrims.pessoas.pessoas', compact('orcrim', 'pessoas'));
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
        
               $filters = $request->except('_token');
        
               $pessoas = $orcrim->pessoasAvailable($request->filter);
        
                //$pessoas = $this->pessoa->All();
              // $pessoas = $this->pessoa->paginate();
        
                return view('admin.pages.orcrims.pessoas.available', compact('orcrim', 'pessoas', 'filters'));
            }
        
               // ANEXAR PESSOAS DESEJADAS A UMA ORCRIM

        
                        public function attachPessoasOrcrim(Request $request, $idOrcrim)
                {
                    if (!$orcrim = $this->orcrim->find($idOrcrim)) {
                        return redirect()->back();
                    }

                    if (!$request->pessoas || count($request->pessoas) == 0) {
                        return redirect()
                                    ->back()
                                    ->with('info', 'Precisa escolher pelo menos um orcrimo');
                    }

                    $orcrim->pessoas()->attach($request->pessoas);

                    return redirect()->route('orcrims.pessoas', $orcrim->id);
                }



                public function detachPessoaOrcrim($idOrcrim, $idPessoa)
                {
                    $orcrim = $this->orcrim->find($idOrcrim);
                    $pessoa = $this->pessoa->find($idPessoa);

                    if (!$orcrim || !$pessoa) {
                        return redirect()->back();
                    }

                    $orcrim->pessoas()->detach($pessoa);

                    return redirect()->route('orcrims.pessoas', $orcrim->id);
                }

                

}
