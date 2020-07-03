@extends('adminlte::page')

@section('title', "EDITANDO Pessoaos {$evento->name}")

@section('content_header')

</script>
@section('content_header')

<!---SCRIPE PARA A DIV ROLANTE DO BOTAO ADD -->
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

<!---FIM DO SCRIPE PARA A DIV ROLANTE DO BOTAO ADD -->

<link rel="stylesheet" type="text/css" href="/css/base.css">

<ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('gerals.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('eventos.index') }}" class="active">Eventos</a></li>
        <li> ...   {!!$evento->name!!}</li>
    </ol>
@stop

@section('content')
   
            <div class="card">
            <div class="card-body">



<div id="caixa3">
	<div id="cx1">
  <form action="{{route('eventos.update', $evento->id)}}" class="form" method="POST" >
@csrf
@method('PUT')
  <div class="form-row">
    <div class="form-group col-md-8" row="4">
      <label> Nome</label>
      <input class="form-control" type="text" name="name" placeholder="name" value=" {{$evento->name ?? old('name')}} ">
    </div>
    <div class="form-group col-md-4">
      <label for="inputCity">DATA DO EVENTO</label>
      <input type="text" class="form-control" name="nascimento" value=" {{$evento->nascimento ?? old('nascimento')}}">
    </div>
    </div>
 <div class="form-row">
 <div class="form-group col-md-4">
      <label for="inputState">TIPO</label>
      <select  class="form-control" name="tipo">
        <option selected>{{$evento->tipo ?? old('tipo')}}</option>
        <option value="Trafico de droga" >Trafico de droga</option>
        <option value="Assalto a banco" >Assalto a banco</option>
        <option value="Crime financeiros" >Crime financeiros</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">STATUS</label>
      <select  class="form-control" name="status">
        <option selected>{{$evento->status ?? old('status')}}</option>
        <option value="Em Analise" >Em Analise</option>
        <option value="Processamento" >Processamento</option>
        <option value="Concluido" >Concluido</option>
      </select>
    </div>
  </div>
	</div>
	<div id="cx2">
 
  <div class="form-group">
    <label for="inputAddress">Observação</label>
    <textarea type="text" class="form-control"    placeholder="1234 Main St" name="description">{{$evento->description ?? old('description')}}</textarea>
 </div>
   <button type="submit" class="btn btn-primary">EDITAR EVENTO</button>
</form>
	</div>
</div>

<div id="caixa4">
  
<div>
<input type="button" value="+ Cadastra " onClick="mostra('cadastro')"/>
   <div id="cadastro" class="hidden">
   <div class="card">
   <div class="card">
            <div class="card-body">
            <form action="url" class="form" method="POST" >
@csrf
@include('admin.includes.alerts')
<div class="form-row">
    <div class="form-group col-md-10">
      <label> Nome</label>
      <input class="form-control" type="text" name="name" placeholder="name" value=" {{$pessoa->id ?? old('id')}} ">
    </div>
    <div class="form-group col-md-2">
      <label for="inputCity">DATA DO EVENTO</label>
      <input type="text" class="form-control" name="nascimento" value=" {{$evento->id ?? old('id')}}">
    </div>
    </div>
   

    <button type="submit" class="btn btn-primary">ASSOCIAR Pessoa</button>
 </form> 
   </div>
</div>

</div>

	<div id="cx3">222</div>
	<div id="cx4">
    222eeeeee
    ffffffffffff
	</div>
</div>

            </div>
            </div>
@endsection    