<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePessoa;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    //
    private $repository;

    public function __construct(Pessoa $pessoa)
    {
        $this->repository = $pessoa;

      //  $this->middleware(['can:pessoas']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoas = $this->repository->latest()->paginate(5);

        return view('admin.pages.pessoas.index', compact('pessoas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.pessoas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdatePessoa  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePessoa $request)
    {
       
        $data = $request->all();
        $data['url']= Str::kebab($request->name);
        

        $this->repository->create($data);

        return redirect()->route('pessoas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$pessoa = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.pessoas.show', compact('pessoa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pessoa = $this->repository->where('id', $id)->first();

        if (!$pessoa)
            return redirect()->back();

        return view('admin.pages.pessoas.edit', [
            'pessoa' => $pessoa
        ]);
    }    

    public function update(StoreUpdatePessoa $request,  $id)
    {
        $pessoa = $this->repository->where('id', $id)->first();

        if (!$pessoa)
            return redirect()->back();

        $pessoa->update($request->all());

        return redirect()->route('pessoas.index');
    }

    public function destroy($id)
    {
        $pessoa = $this->repository
                        ->where('id', $id)
                        ->first();

        if (!$pessoa)
            return redirect()->back();
        
            $pessoa->delete();

        return redirect()->route('pessoas.index');
    }

    public function search(Request $request)
    {
         $filters = $request->except('_token');

        $pessoas = $this->repository->search($request->filter);

        return view('admin.pages.pessoas.index', [
            'pessoas' => $pessoas,
             'filters' => $filters,
        ]);
    }

    

}




