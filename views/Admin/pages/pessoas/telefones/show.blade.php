@extends('adminlte::page')

@section('title', "Detalhes da Telefone de {$pessoa->name}")

@section('content_header')


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}} ">Dashboard</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{route('pessoas.index')}}" >Pessoaos</a></li>
   
    <li class="breadcrumb-item" aria-current="page"><a href="{{route('telefones.pessoa.index', $pessoa->id)}}" class="active">Detalhes</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('telefones.pessoa.edit', [$pessoa->id, $telefone->id])}}" class="active">Detalhes</a></li>
</ol>
</nav>

<h1> Detalhes da Telefone de {{$pessoa->name}} </h1>

@stop

@section('content')
   
            <div class="card">
            
        <div class="card-body">
       <ul>
       <li><strong>NOME   ...</strong>{{$telefone->numero}} </li>
       <li><strong>DESCRIÇÃO   ...</strong>{{$telefone->description}} </li>
      
       </ul> 
       
       </div>
       <div class="car-footer">
            <form action="{{route('telefones.pessoa.destroy', [$pessoa->id, $telefone->id])}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Deletar a telefone {{$telefone->telefone}} de {{$pessoa->name}} </button>
            </form>

           </div>
       </div>
       @endsection