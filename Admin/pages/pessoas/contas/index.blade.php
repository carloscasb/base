@extends('adminlte::page')

@section('title', "Detalhes do Pessoaos {$pessoa->name}")

@section('content_header')


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}} ">Dashboard</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{route('pessoas.index')}}" >Pessoaos</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{route('pessoas.show', $pessoa->id)}}" >{{$pessoa->name}}</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('contas.pessoa.index', $pessoa->id)}}" class="active">Detalhes</a></li>
  </ol>
</nav>

<div id="cx1">

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

</div>

@stop

@section('content')
   
            <div class="card">
            
        <div class="card-body">

 @include ('admin\includes\alerts')

        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Banco</th>
                    <th>Agencia</th>
                    <th>Conta</th>
                    <th style="width: 50px">Ação</th>

                </tr>

            </thead>
            <body>
                @foreach($contas as $conta)
                 <tr>
                    <td>{{ $conta->banco }}</td>
                    <td>{{ $conta->agencia }}</td>
                    <td>{{ $conta->conta }}</td>
                    
                    <td style="width: 250px;">
                    <a href="{{ route('pessoas.edit', $pessoa->id) }}" class="btn btn-warning">EDITAR</a>
                    <a href="{{ route('pessoas.show', $pessoa->id) }}" class="btn btn-warning">VER</a>
                    </td>
                    </tr>
                @endforeach
            </body>
        </table>
       
    
                </div>
            </div>

            <div class="card-footer">

                @if (isset ($filters)) 
                {!! $contas->appends($filters)->links() !!}
                @else
                 {!! $contas->links() !!}
                @endif

               
            </div>

@stop