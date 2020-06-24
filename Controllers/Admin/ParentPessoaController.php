<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ParentPessoa;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class ParentPessoaController extends Controller
{
    //

    protected $parent, $pessoa;

    public function __construct(ParentPessoa $parentpessoa, Pessoa $pessoa)
    {
        $this->parent = $parentpessoa;
        $this->pessoa = $pessoa;

      //  $this->middleware(['can:orcrims']);
    }

    public function index()
    {

       // $pessoas = $this->pessoa->all();
        // $pessoas = $this->pessoa->paginate(4);
        $pessoas = $this->pessoa->latest()->paginate();
        return view('admin.pages.parents.index', [
            'pessoas' => $pessoas,
            ]);

        }
                          
        public function create()
        {
            return view('admin.pages.parents.create');
        }

            
        //public function store(StoreUpdatePessoa $request)
        public function store(Request $request, $idParent )
        {
           
            $data = $request->all();
            $data['id']= Str::kebab($request->name);
            
    
            $this->parent->create($data);
    
            return redirect()->route('parents.index');
        }



    
}
