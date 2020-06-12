@extends('adminlte::page')

@section('title', 'Pessoaos')

@section('content_header')
<ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('gerals.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('pessoas.index') }}" class="active">Pessoas</a></li>
    </ol>
    <a href="{{route('pessoas.create')}}" class="btn btn-dark">CADASTRAR PESSOAS</a>
        @stop

@section('content')
   
            <div class="card">
            <div class="card-header">
            <form action="{{ route('pessoas.search') }}" method="POST" class="form form-inline">
        @csrf
        <input type="text" name="filter" placeholder="NOME" class="form-control" value="{{ $filters ['filter']  ?? ''}}" >
        <button type="submit" class="btn btn-dark">PESQUISAR</button>
        </form>


                </div>
        <div class="card-body">

        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Vulgo</th>
                     <th style="width: 200px">Ação</th>

                </tr>

            </thead>
            <body>
                @foreach($pessoas as $pessoa)
                 <tr>
                    <td>{{ $pessoa->name }}</td>
                    <td>{{ $pessoa->vulgo }}</td>
                    <td>
                    <a href="{{ route('pessoas.edite', $pessoa->id) }}" class="btn btn-primary"><i class="fab fa-searchengin"></i></a>
                    <a href="{{ route('pessoas.edit', $pessoa->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{ route('pessoas.show', $pessoa->id) }}" class="btn btn-warning">VER</a>
                    </td>
                    </tr>
                @endforeach
            </body>
        </table>
       
    
                </div>
            </div>
            <div class="card-footer">
            <div class="card-footer">

@if (isset ($filters)) 
{!! $pessoas->appends($filters)->links() !!}
@else
 {!! $pessoas->links() !!}
@endif
            </div>

@stop