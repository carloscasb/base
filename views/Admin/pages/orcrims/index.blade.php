@extends('adminlte::page')

@section('title', 'Orcrims')


</script>
@section('content_header')
<ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('gerals.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('orcrims.index') }}" class="active">Orcrims</a></li>
    </ol>
    <style type="text/css">
.hidden {
    display:none;
}
input {
    display: block;
}
</style>
<script>
function mostra(id) {
     if (document.getElementById (id).style.display =='none' ){
        document.getElementById (id).style.display = 'block'
     }else {document.getElementById (id).style.display = 'none'  } 
}
</script>

<input type="button" value="+ Cadastra Orcrims" onClick="mostra('cadastro')"/>
   <div id="cadastro" class="hidden">
   <div class="card">
   <div class="card">
            <div class="card-body">
            <form action="{{route('orcrims.store')}}" class="form" method="POST" >
@csrf
@include('admin.includes.alerts')

  <div class="form-row">
    <div class="form-group col-md-3">
      <label> Nome</label>
      <input class="form-control" type="text" name="name" placeholder="name" value=" {{$orcrim->name ?? old('name')}} ">
    </div>
    <div class="form-group col-md-3">
      <label >Sigla</label>
      <input type="text" class="form-control" name="sigla" placeholder="sigla" value=" {{$orcrim->sigla ?? old('sigla')}} ">
    </div>
    <div class="form-group col-md-3">
      <label> Estado</label>
      <input class="form-control" type="text" name="estado" placeholder="estado" value=" {{$orcrim->estado ?? old('estado')}} ">
    </div>
  </div>
  <div class="form-row">
        <div class="form-group col-md-6">
      <label >Descrição</label>
      <input type="text" class="form-control" name="description" placeholder="description" value=" {{$orcrim->description ?? old('description')}} ">
    </div>
    
    </div>
    <button type="submit" class="btn btn-primary">CADASTRAR ORCRIMS</button>
 </form> 
   </div>
   
   </div>

@stop

@section('content')
   
            <div class="card">
            <div class="card-header">
            <form action="{{ route('orcrims.search') }}" method="POST" class="form form-inline">
        @csrf
        <input type="text" name="filter" placeholder="NOME" class="form-control" value="{{ $filters ['filter']  ?? ''}}" >
        <button type="submit" class="btn btn-dark">PESQUISAR</button>
        </form>

                </div>
        <div class="card-body">

        <table class="table table-condensed">
            <thead>
                <tr>                    
                        <th style="width:20px">Info</th>
                        <th style="width:450px">Nome</th>
                        <th >Sigla</th>
                        <th style="width:50px">AçÃo</th>
                </tr>

            </thead>
            <body>
                @foreach($orcrims as $orcrim)
                 <tr>
                     <td>
                    <a href="{{ route('orcrims.pessoas', $orcrim->id) }}" class="btn btn-warning"><i class="fas fa-users"></i>Menbros</a>
                    </td>
                    <td>{{ $orcrim->name }}</td>
                    <td>{{ $orcrim->sigla }}</td>
                    <td>
                    <a href="{{ route('orcrims.edit', $orcrim->id) }}" ><i class="fas fa-edit"></i></a>
                    </td>
                     <td>
                    <a href="{{ route('orcrims.show', $orcrim->id) }}" ><i class="fas fa-trash-alt"></i></a>
                    </td>
                    
                    <td>
                    <a href="{{ route('membros.orcrim.index', $orcrim->id) }}" ><i class="fas fa-user-secret"></i></a>
                    </td>
                  </tr>
                @endforeach
            </body>
        </table>
         
                </div>
            </div>
            <div class="card-footer">
            @if (isset ($filters)) 
                {!! $orcrims->appends($filters)->links() !!}
                @else
                 {!! $orcrims->links() !!}
                @endif

               
            </div>

@stop