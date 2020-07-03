@extends('adminlte::page')

@section('title', 'Eventos')


</script>
@section('content_header')
<ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('gerals.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('eventos.index') }}" class="active">Eventos</a></li>
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

<input type="button" value="+ Cadastra " onClick="mostra('cadastro')"/>
   <div id="cadastro" class="hidden">
   <div class="card">
   <div class="card">
            <div class="card-body">
            <form action="{{route('eventos.store')}}" class="form" method="POST" >
@csrf
@include('admin.includes.alerts')

  <div class="form-row">
    <div class="form-group col-md-10">
      <label> Nome</label>
      <input class="form-control" type="text" name="name" placeholder="name" value=" {{$evento->name ?? old('name')}} ">
    </div>
    <div class="form-group col-md-2">
      <label for="inputCity">DATA DO EVENTO</label>
      <input type="text" class="form-control" name="nascimento" value=" {{$evento->nascimento ?? old('nascimento')}}">
    </div>
    </div>
 <div class="form-row">
 <div class="form-group col-md-3">
      <label for="inputState">TIPO</label>
      <select  class="form-control" name="tipo">
        <option selected>Sem função...</option>
        <option value="Trafico de droga" >Trafico de droga</option>
        <option value="Assalto a banco" >Assalto a banco</option>
        <option value="Crime financeiros" >Crime financeiros</option>
      </select>
    </div>
    <div class="form-group col-md-3">
      <label for="inputState">STATUS</label>
      <select  class="form-control" name="status">
        <option selected>Sem função...</option>
        <option value="Em Analise" >Em Analise</option>
        <option value="Processamento" >Processamento</option>
        <option value="Concluido" >Concluido</option>
      </select>
    </div>
  </div>
  
  <div class="form-row">
        <div class="form-group col-md-10">
      <label >Descrição</label>
      <input type="text" class="form-control" name="description" placeholder="DLL" value=" {{$evento->description ?? old('description')}} ">
    </div>
    
    </div>
    <button type="submit" class="btn btn-primary">CADASTRAR Eventos</button>
 </form> 
   </div>
   
   </div>

@stop

@section('content')
   
            <div class="card">
            <div class="card-header">
            <form action="{{ route('eventos.search') }}" method="POST" class="form form-inline">
        @csrf
        <input type="text" name="filter" placeholder="NOME" class="form-control" value="{{ $filters ['filter']  ?? ''}}" >
        <button type="submit" class="btn btn-dark">PESQUISAR</button>
        </form>

                </div>
        <div class="card-body">

        <table class="table table-condensed">
            <thead>
                <tr>                    
                        <th style="width:150px">Ver</th>
                        <th>Nome</th>
                        <th>Tipo</th>
                         <th style="width:50px">Ação</th>

                </tr>

            </thead>
            <body>
                @foreach($eventos as $evento)
                 <tr>
                     <td>
                   <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-warning"><i class="fas fa-search"></i></a> 
                    </td>
                    <td>{{ $evento->name }}</td>
                    <td>{{ $evento->tipo }}</td>
                    <td>
                    <a href="{{ route('eventos.pessoas.acesso', $evento->id) }}" title="Assoociar"><i class="fas fa-edit"></i></a>
                    </td>
                    <td>
                    <a href="{{ route('eventos.show', $evento->id) }}" title="Deletar"><i class="fas fa-trash-alt"></i></a>
                    </td>
                    </tr>
                @endforeach
            </body>
        </table>
         
                </div>
            </div>
            <div class="card-footer">
            @if (isset ($filters)) 
                {!! $eventos->appends($filters)->links() !!}
                @else
                 {!! $eventos->links() !!}
                @endif
            </div>
@stop