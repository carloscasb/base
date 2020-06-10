@extends('adminlte::page')

@section('title', 'Cadastrando Nova Conta')

@section('content_header')
<link rel="stylesheet" type="text/css" href="/css/base.css">
<ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('gerals.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('pessoas.index') }}" class="active">Pessoas</a></li>
        
    </ol>
<h1>Cadastrando Novo Conta {{$pessoa->name}}  </h1>

@stop

@section('content')
   
            <div class="card">
            <div class="card-body">
            <form action="{{route('contas.pessoa.store',  $pessoa->id)}}" class="form" method="POST" >
@csrf
@include('admin.includes.alerts')

  <div class="form-row">
    <div class="form-group col-md-3">
      <label> Banco</label>
      <input class="form-control" type="text" name="banco" placeholder="banco" value=" {{$pessoa->banco ?? old('banco')}} ">
    </div>
    <div class="form-group col-md-3">
      <label >Agencia</label>
      <input type="text" class="form-control" name="agencia" placeholder="agencia" value=" {{$pessoa->agencia ?? old('vulgo')}} ">
    </div>
      <div class="form-group col-md-3">
      <label> Conta</label>
      <input class="form-control" type="text" name="conta" placeholder="conta" value=" {{$pessoa->conta ?? old('conta')}} ">
    </div>
   
   </div>
    <button type="submit" class="btn btn-primary"  >ADD CONTAS</button>
</form>
</div>
</div>
@endsection   