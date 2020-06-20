@extends('adminlte::page')

@section('title', "Detalhes do Pessoaos {$pessoa->name}")

@section('content_header')


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}} ">Dashboard</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{route('pessoas.index')}}" >Pessoas</a></li>
    
    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('membros.orcrim.index', $pessoa->id)}}" class="active">Detalhes</a></li>
  </ol>
</nav>
<h1>{{$pessoa->name}}</h1>
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
                   
                    <th style="width: 50px">Ação</th>

                </tr>

            </thead>
            <body>
                @foreach($membros as $membro)
                 <tr>
                    <td>{{ $membro->numero }}</td>
                    <td>{{ $membro->discrypton }}</td>
                   
                    
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
                {!! $membros->appends($filters)->links() !!}
                @else
                 {!! $membros->links() !!}
                @endif

               
            </div>

@stop