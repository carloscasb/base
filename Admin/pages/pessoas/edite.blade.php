@extends('adminlte::page')

@section('title', "EDITANDO Pessoaos {$pessoa->name}")

@section('content_header')
<link rel="stylesheet" type="text/css" href="/css/base.css">

<ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('gerals.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('pessoas.index') }}" class="active">Pessoas</a></li>
        <li> ...   {!!$pessoa->name!!}</li>
    </ol>
@stop

@section('content')
   
            <div class="card">
            <div class="card-body">

<div id="caixa2">
	<button type="button"  class="btn btn-primary">Foto</button>
          <button type="button" class="btn btn-primary">Telefone</button>
          <a href="{{ route('contas.pessoa.index', $pessoa->id) }}" class="btn btn-primary">Dados bancários</a>
            
                  <button type="button" class="btn btn-light">Telefone</button>
</div>



<div id="caixa3">
	<div id="cx1">

	</div>
	<div id="cx2">
    <form action="{{route('pessoas.update', $pessoa->id)}}" class="form" method="POST" >
@csrf
@method('PUT')
<div class="form-row">
    <div class="form-group col-md-6">
      <label> Nome</label>
      <input class="form-control" type="text" name="name" placeholder="name" value=" {{$pessoa->name ?? old('name')}} ">
    </div>
    <div class="form-group col-md-6">
      <label >Vulgo</label>
      <input type="text" class="form-control" name="vulgo" placeholder="vulgo" value=" {{$pessoa->vulgo ?? old('vulgo')}} ">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label> Mãe</label>
      <input class="form-control" type="text" name="mae" placeholder="mae" value=" {{$pessoa->mae ?? old('mae')}} ">
    </div>
    <div class="form-group col-md-6">
      <label >Nascimento</label>
      <input type="text" class="form-control" name="nasc" placeholder="DLL" value=" {{$pessoa->nasc ?? old('nasc')}} ">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label> RG - Identidade</label>
      <input class="form-control" type="text" name="rg"  value=" {{$pessoa->rg ?? old('rg')}} ">
    </div>
    <div class="form-group col-md-6">
      <label >Expedidor</label>
      <input type="text" class="form-control" name="exp" placeholder="DLL" value=" {{$pessoa->exp ?? old('exp')}} ">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">CPF</label>
      <input type="text" class="form-control" name="cpf" placeholder="cpf" value=" {{$pessoa->cpf ?? old('cpf')}} ">
    </div>
    <div class="form-group col-md-3">
      <label >Genero</label>
      <input type="text" class="form-control" name="genero" placeholder="genero" value=" {{$pessoa->genero ?? old('genero')}} ">
     </div>
     <div class="form-group col-md-3">
      <label >Situação Penal</label>
      <input type="text" class="form-control" name="situa" placeholder="situa" value=" {{$pessoa->situa ?? old('situa')}} ">
     </div>
    
    </div>
  <div class="form-group">
    <label for="inputAddress">Observação</label>
    <textarea type="text" class="form-control" id="inputAddress" placeholder="1234 Main St"></textarea>
 </div>
   <button type="submit" class="btn btn-primary">EDITAR PESSOAS</button>
</form>
	</div>


</div>

<div id="caixa4">
	<div id="cx3">222</div>
	<div id="cx4">
		222eeeeee
	</div>
</div>

            </div>
            </div>
@endsection            