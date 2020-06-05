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
                #filtross

                </div>
        <div class="card-body">

        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                     <th style="width: 50px">Ação</th>

                </tr>

            </thead>
            <body>
                @foreach($pessoas as $pessoa)
                 <tr>
                    <td>{{ $pessoa->name }}</td>
                    <td>{{ $pessoa->cpf }}</td>
                    <td>
                    <a href="url" class="btn btn-warning">Detalhe</a>
                    </td>
                    </tr>
                @endforeach
            </body>
        </table>
       
    
                </div>
            </div>

@stop