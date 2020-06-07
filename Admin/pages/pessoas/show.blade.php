@extends('adminlte::page')

@section('title', "DETALHE Pessoaos  {$pessoa->name} ")

@section('content_header')
<h1>Detalhe do Palno <b>{{ $pessoa->name }}</b>  </h1>

@stop

@section('content')

            <div class="card">
            <div class="card-body">
            <ul>
            <li>
            <strong>NOME</strong> {{ $pessoa->name }}
            </li>
            <li>
            <strong>Url</strong> {{ $pessoa->vulgo }}
            </li>
           
            <li>
            <strong>DESCRIÇÂO</strong> {{ $pessoa->description }}
            </li>
            </ul>
            <form action=" {{ route('pessoas.destroy', $pessoa->id) }}"  method="POST"  >
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETAR O PessoaO {{ $pessoa->name }}</button>
               
                </form>
            </div>
            </div>
            @endsection