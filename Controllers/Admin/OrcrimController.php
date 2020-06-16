<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateOrcrim;
use App\Models\Orcrim;
use Illuminate\Http\Request;

class OrcrimController extends Controller
{
    //

    private $repository; 
      
       public function __construct(Orcrim $orcrim)
       {
           $this->repository= $orcrim;
        }
        
       public function index()
        {

            $orcrims = $this->repository->latest()->paginate();

            return view('admin.pages.orcrims.index', compact('orcrims'));

            /*

            $orcrims = $this->repository->latest()->paginate(); //DO MAIS ANTIGO PARA O NOVO
         //   $orcrims = $this->repository->paginate(1);
         //    $orcrims = $this->repository->all();
            return view('admin.pages.orcrims.index', [
                'orcrims' => $orcrims,
                ]);

                */
        }

                public function create()
                {
                    return view('admin.pages.orcrims.create');
                }

                          
                public function store(StoreUpdateOrcrim $request)
                 // public function store(Request $request  )
                {
                   
                    $data = $request->all();
                    $data['url']= Str::kebab($request->name);
                    
            
                    $this->repository->create($data);
            
                    return redirect()->route('orcrims.index');
                }

                public function edit($id)
                {
                    $orcrim = $this->repository->where('id', $id)->first();
            
                    if (!$orcrim)
                        return redirect()->back();
            
                    return view('admin.pages.orcrims.edit', [
                        'orcrim' => $orcrim
                    ]);
                }    

                public function update(StoreUpdateOrcrim $request,  $id)
                 // public function update(Request $request,  $id)
                {
                    $orcrim = $this->repository->where('id', $id)->first();
            
                    if (!$orcrim)
                        return redirect()->back();
            
                    $orcrim->update($request->all());
            
                    return redirect()->route('orcrims.index');
                }



                public function show($id)
                        {
                            if (!$orcrim = $this->repository->find($id)) {
                                return redirect()->back();
                            }

                            return view('admin.pages.orcrims.show', compact('orcrim'));
                        }

                public function destroy($id)
                {
                    $orcrim = $this->repository
                                    ->where('id', $id)
                                    ->first();

                    if (!$orcrim)
                        return redirect()->back();
                    
                        $orcrim->delete();

                    return redirect()->route('orcrims.index');
                }


                public function search(Request $request)
                    {
                        $filters = $request->except('_token');

                        $orcrims = $this->repository->search($request->filter);

                        return view('admin.pages.orcrims.index', [
                            'orcrims' => $orcrims,
                            'filters' => $filters,
                        ]);
                    }


}
