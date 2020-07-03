@extends('adminlte::page')

@section('title', 'PESSOASdisponíveis para o orcrimo {$orcrim->name}')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('orcrims.index') }}">ORCRIM</a></li>
        <li class="breadcrumb-item"><a href="{{ route('orcrims.pessoas', $orcrim->id) }}">Perfis</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('orcrims.pessoas.available', $orcrim->id) }}" class="active">Disponíveis</a></li>
    </ol>

    <h1>PESSOASdisponíveis para o orcrimo <strong>{{ $orcrim->name }}</strong></h1>

@stop

@section('content')
<div class="card">
        <div class="card-header">
        <form action="{{ route('orcrims.membros.attach', $orcrim->id) }}" class="form" method="POST" >
        @csrf
@include('admin.includes.alerts')
  <div class="form-row">
  <div class="form-group col-md-3">
      <label >ORCRIM</label>
      <input type="text" class="form-control" id="orcrim_id"  name="orcrim_id"  value="{{ $orcrim->id  }}">
    </div>
    <div class="form-group col-md-3">
      <label for="inputCity">ID ORCRIM</label>
      <input type="text" class="form-control" id="orcrim_id"  vname="orcrim_id"  value="{{ $orcrim->name }}">
    </div>
    
    <div class="form-group col-md-6">
      <label for="inputState">MEMBRO</label>
      <select id="inputState" class="form-control" name="name">
      @foreach ($pessoas as $pessoa)
      <option selected>Choose...</option>
        <option value ="{{$pessoa->name ?? old('name')}}"> {{$pessoa->name ?? old('name')}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-3">
      <label for="inputState">FUNÇÂO</label>
      <select  class="form-control" name="func">
        <option selected>Sem função...</option>
        <option value="Sintonia da rua" >Sintonia da rua</option>
        <option value="Geral da rua" >Geral da rua</option>
        <option value="Sintonia da gravata" >Sintonia da gravata</option>
      </select>
    </div>
    <div class="form-group col-md-3">
        <label for="inputAddress">LIDERANÇA</label>
        <input type="text" class="form-control" name="lidera" placeholder="1234 Main St" value="{{ $pessoa->name}}">
    </div>
    </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">QUEBRADA</label>
      <input type="text" class="form-control" name="quebrada">
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">PADRINHO</label>
      <select name="padrinho" class="form-control">
      @foreach ($pessoas as $pessoa)
      <option selected>Sem padrinho...</option>
        <option value ="{{$pessoa->name }}"> {{ $pessoa->name }}</option>
        @endforeach
      </select>
    </div>
   </div>
   <div class="form-row">
   <div class="form-group col-md-2">
      <label for="inputCity">DATA FILIAÇÂO</label>
      <input type="text" class="form-control" name="databast" >
    </div>

    <div class="form-group col-md-2">
      <label for="inputCity">LOCAL DE FILIAÇÃO</label>
      <input type="text" class="form-control" name="localbast">
    </div>
    <div class="form-group col-md-4">
      <label for="inputCity">AREA DE ATUAÇÃO</label>
      <input type="text" class="form-control" name="atua">
    </div>
   </div>
   <div class="form-row">
   <div class="form-group col-md-2">
      <label for="inputCity">OBSERVAÇÂO</label>
      <input type="text" class="form-control" name="description">
    </div>
       </div>
  <button type="submit" class="btn btn-primary">INSERIR/CADASTRAR</button>
</form>
</div>
 </div>
         

 
@stop