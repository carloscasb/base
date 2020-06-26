<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\ParentPessoa;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class ParentPessoaController extends Controller
{
    //

    protected $parent, $pessoa;

    public function __construct(ParentPessoa $parent, Pessoa $pessoa)
    {
        $this->parent = $parent;
        $this->pessoa = $pessoa;

      //  $this->middleware(['can:orcrims']);
    }

    public function index()
    {

       // $pessoas = $this->pessoa->all();
        // $pessoas = $this->pessoa->paginate(4);
        $pessoas = $this->pessoa->latest()->paginate();
        $parents = $this->parent->latest()->paginate();
        return view('admin.pages.parents.index', [
            'pessoas' => $pessoas,
            'parent' => $parents,
            ]);

        }
                          
        public function create()
        {
            return view('admin.pages.parents.create');
        }

        /*
        //public function store(StoreUpdatePessoa $request)
        public function store(Request $request, ParentPessoa $parent)
        {

            $this->parent->create($request->all());

              return redirect ()-> route('parents.index', $parent);
         // return view('admin.pages.parents.index', $parentpessoa);
        }

*/

            public function store(Request $request, ParentPessoa $parent) {
                //dd($parent->all());
                $this->parent->create($request->all());

                return redirect ()-> route('parents.index', $parent);
            }

    
}
