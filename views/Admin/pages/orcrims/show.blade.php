@extends('adminlte::page')
@section('title', "DETALHE DO Prcrimos  {$orcrim->name} ")
@section('content_header')
<h1>Detalhe do PrcrimO <b>{{ $orcrim->name }}</b>  </h1>
@stop
@section('content')

            <div class="card">
            <div class="card-body">
            <ul>
            <li>
            <strong>NOME</strong> {{ $orcrim->name }}
            </li>
            <li>
            <strong>Sigla</strong> {{ $orcrim->sigla }}
            </li>
            <li>
            <strong>Estado</strong> {{ $orcrim->estado  }}
            </li>
            <li>
            <strong>DESCRIÇÂO</strong> {{ $orcrim->description }}
            </li>
          
            </ul>

                <form action=" {{ route('orcrims.destroy', $orcrim->id) }}"  method="POST"  >
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETAR A ORCRIM {{ $orcrim->name }}</button>
               
                </form>

            </div>
            </div>
            @endsection