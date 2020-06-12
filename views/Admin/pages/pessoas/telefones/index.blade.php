@extends('adminlte::page')

@section('title', "Detalhes do Pessoaos {$pessoa->name}")

@section('content_header')


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}} ">Dashboard</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{route('pessoas.index')}}" >Pessoas</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('telefones.pessoa.index', $pessoa->id)}}" class="active">Detalhes do telefone de {{$pessoa->name}}</a></li>
  </ol>
</nav>

<div id="cx1">
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
</div>

@stop

@section('content')
   
            <div class="card">
            
        <div class="card-body">

 @include ('admin\includes\alerts')

        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Numero</th>
                    <th>Descrição</th>
                   
                    <th style="width: 50px">Ação</th>

                </tr>

            </thead>
            <body>
                @foreach($telefones as $telefone)
                 <tr>
                    <td>{{ $telefone->numero }}</td>
                    <td>{{ $telefone->description }}</td>
                   
                    
                    <td style="width: 200px;">
                    <a href="{{ route('telefones.pessoa.edit', [$pessoa->id, $telefone->id]) }}" class="btn btn-warning">EDITAR</a>
                    <a href="{{ route('telefones.pessoa.show', [$pessoa->id, $telefone->id]) }}" class="btn btn-warning"><i class="fas fa-trash-alt"></i></a>
                    </td>
                    </tr>
                @endforeach
            </body>
        </table>
       
    
                </div>
            </div>

            <div class="card-footer">

                @if (isset ($filters)) 
                {!! $telefones->appends($filters)->links() !!}
                @else
                 {!! $telefones->links() !!}
                @endif

               
            </div>

@stop