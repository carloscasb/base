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

    private $repository, $orcrim;

    public function __construct(MembroOrcrim $membroorcrim, Orcrim $orcrim)
       {
           $this->repository= $membroorcrim;
           $this->orcrim = $orcrim;
      
        }


        public function index($idOrcrim)
        {
          If(!$orcrim = $this->orcrim->where ('id', $idOrcrim)->first()) {         //SE NÃo ACHOU (recuperando pela url)
            return redirect()->back();
          }                                                                   //SE ACHOU (recuperando pela url)
                 
          // $membros = $pessoa->membros();
          $membros = $orcrim->membros()->paginate(); 
          
        return view('admin.pages.orcrims.membros.index', [
            'pessoa' => $orcrim,
            'membros'=> $membros,

            ]);

            }


              public function create($idOrcrim)
                         
              {
                if (!$orcrim = $this->orcrim->where('id', $idOrcrim)->first()) {
                    return redirect()->back();
                }
        
                return view('admin.pages.orcrims.membros.create', [
                    'orcrim' => $orcrim,
                ]);
            }

            public function store(Request $request, $idOrcrim )
            {
                if (!$orcrim = $this->orcrim->where('id', $idOrcrim)->first()) {
                    return redirect()->back();
                }
        
                // $data = $request->all();
                // $data['orcrim_id'] = $orcrim->id;
                // $this->repository->create($data);
                $orcrim->membros()->create($request->all());
        
                return redirect()->route('membros.orcrim.index', $orcrim->id);
            }
           



}