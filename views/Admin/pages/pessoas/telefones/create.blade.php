@extends('adminlte::page')

@section('title', 'Cadastrando Nova Telefone')

@section('content_header')
<link rel="stylesheet" type="text/css" href="/css/base.css">
<ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('gerals.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('pessoas.index') }}" class="active">Pessoas</a></li>
        
    </ol>
<h1>Cadastrando Novo Telefone {{$pessoa->name}}  </h1>

@stop

@section('content')
   
            <div class="card">
            <div class="card-body">
            <form action="{{route('telefones.pessoa.store',  $pessoa->id)}}" class="form" method="POST" >
@csrf
@include('admin.includes.alerts')

  <div class="form-row">
    <div class="form-group col-md-3">
      <label> Numero</label>
      <input class="form-control" type="text" name="numero" placeholder="numero" value=" {{$pessoa->numero ?? old('numero')}} ">
    </div>
    <div class="form-group col-md-3">
      <label >Descrição</label>
      <input type="text" class="form-control" name="description" placeholder="description" value=" {{$pessoa->description ?? old('description')}} ">
    </div>
        
   </div>
    <button type="submit" class="btn btn-primary"  >ADD TELEFONES</button>
</form>
</div>
</div>
@endsection   