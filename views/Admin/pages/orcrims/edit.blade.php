@extends('adminlte::page')

@section('title', "EDITANDO  {$orcrim->name}")

@section('content_header')
<h1>EDITANDO  {{$orcrim->name}}  </h1>

@stop

@section('content')
<ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('gerals.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('orcrims.index') }}" class="active">Orcrim</a></li>
    </ol>

            <div class="card">
            <div class="card-body">
            <form action="{{route('orcrims.update', $orcrim->id)}}" class="form" method="POST" >
@csrf
@method('PUT')
<div class="form-row">
    <div class="form-group col-md-6">
      <label> Nome</label>
      <input class="form-control" type="text" name="name" placeholder="name" value=" {{$orcrim->name ?? old('name')}} ">
    </div>
    <div class="form-group col-md-6">
      <label >Sigla</label>
      <input type="text" class="form-control" name="sigla" placeholder="sigla" value=" {{$orcrim->sigla ?? old('sigla')}} ">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label> Estado</label>
      <input class="form-control" type="text" name="estado" placeholder="estado" value=" {{$orcrim->estado ?? old('estado')}} ">
    </div>
    <div class="form-group col-md-6">
      <label >Descrição</label>
      <input type="text" class="form-control" name="description" placeholder="DLL" value=" {{$orcrim->description ?? old('description')}} ">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">EDITAR ORCRIMS</button>
</form>
</div>
</div>


@endsection                      