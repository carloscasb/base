@extends('adminlte::page')

@section('title', 'Cadastrando Novo Pessoas')

@section('content_header')
<ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('gerals.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('pessoas.index') }}" class="active">Pessoas</a></li>
    </ol>
<h1>Cadastrando Novo Pessoas  </h1>

@stop

@section('content')
   
            <div class="card">
            <div class="card-body">
            <form action="{{route('pessoas.store')}}" class="form" method="POST" >
@csrf
@include('admin.includes.alerts')

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
   <button type="submit" class="btn btn-primary">CADASTRAR PESSOAS</button>
</form>
</div>
</div>
@endsection   