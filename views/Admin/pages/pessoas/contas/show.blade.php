@extends('adminlte::page')

@section('title', "Detalhes da Conta de {$pessoa->name}")

@section('content_header')


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}} ">Dashboard</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{route('pessoas.index')}}" >Pessoaos</a></li>
    
    <li class="breadcrumb-item" aria-current="page"><a href="{{route('contas.pessoa.index', $pessoa->id)}}" class="active">Conta pessoa</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('contas.pessoa.edit', [$pessoa->id, $conta->id])}}" class="active">Editar essa conta</a></li>
</ol>
</nav>

<h1> Detalhes da Conta de {{$pessoa->name}} </h1>

@stop

@section('content')
   
            <div class="card">
            
        <div class="card-body">
       <ul>
       <li><strong>NOME  :  </strong>{{$conta->banco}}</li>
       <li><strong>AGENCIA  :  </strong>{{$conta->agencia}}</li>
       <li><strong>CONTA  :  </strong>{{$conta->conta}}</li>
       </ul> 
       
       </div>
       <div class="car-footer">
            <form action="{{route('contas.pessoa.destroy', [$pessoa->id, $conta->id])}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Deletar a conta {{$conta->conta}} de {{$pessoa->name}} </button>
            </form>

           </div>
       </div>
       @endsection