<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    //

    private $evento, $pessoa; 
      
       public function __construct(Evento $evento, Pessoa $pessoa)
       {
           $this->evento= $evento;
           $this->pessoa = $pessoa;
        }


       public function index()
        {

            $eventos = $this->evento->latest()->paginate();
            return view('admin.pages.eventos.index', compact('eventos', 'pessoa'));
        //     $eventos = $this->evento->paginate(1);
              //  $eventos = $this->evento->all();
           
             //  return view('admin.pages.eventos.index', [
               //  'eventos' => $eventos,
               //  ]);

            }       

            public function create()
            {
                return view('admin.pages.eventos.create');
            }

             //public function store(StoreUpdatePessoa $request)
             public function store(Request $request )
             {
                
                 $data = $request->all();
                 $data['url']= Str::kebab($request->name);
                 
         
                 $this->evento->create($data);
         
                 return redirect()->route('eventos.index');
             }

             public function show($id)
             {
                 if (!$evento = $this->evento->find($id)) {
                     return redirect()->back();
                 }

                 return view('admin.pages.eventos.show', compact('evento'));
             }

                 

                    public function destroy($id)
                    {
                    $evento = $this->evento
                                ->where('id', $id)
                                ->first();

                    if (!$evento)
                    return redirect()->back();

                    $evento->delete();

                    return redirect()->route('eventos.index');
                    }

                    public function search(Request $request)
                    {
                         $filters = $request->except('_token');
                
                        $eventos = $this->evento->search($request->filter);
                
                        return view('admin.pages.eventos.index', [
                            'eventos' => $eventos,
                             'filters' => $filters,
                        ]);
                    }


                    public function edit( $id )
                    {
                        

                        $evento = $this->evento->where('id', $id)->first();
                
                        if (!$evento)
                            return redirect()->back();
                
                        return view('admin.pages.eventos.edit', [
                            'evento' => $evento,
                           
                        ]);
                    }    
            
                    public function update(Request $request,  $id)
                    {
                        $evento = $this->evento->where('id', $id)->first();
                
                        if (!$evento)
                            return redirect()->back();
                
                        $evento->update($request->all());
                
                        return redirect()->route('eventos.index');
                    }
                



                    

}
