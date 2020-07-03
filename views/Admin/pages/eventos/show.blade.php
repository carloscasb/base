@extends('adminlte::page')
@section('title', "DETALHE DO Pventoos  {$evento->name} ")
@section('content_header')
<ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('gerals.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('eventos.index') }}" class="active">Eventos</a></li>
    </ol>
<h1>Detalhe do PventoO <b>{{ $evento->name }}</b>  </h1>
@stop
@section('content')

            <div class="card">
            <div class="card-body">
            <ul>
            <li>
            <strong>NOME</strong> {{ $evento->name }}
            </li>
            <li>
            <strong>Sigla</strong> {{ $evento->sigla }}
            </li>
            <li>
            <strong>Estado</strong> {{ $evento->estado  }}
            </li>
            <li>
            <strong>DESCRIÇÂO</strong> {{ $evento->description }}
            </li>
          
            </ul>

                <form action=" {{ route('eventos.destroy', $evento->id) }}"  method="POST"  >
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETAR A Evento {{ $evento->name }}</button>
               
                </form>

            </div>
            </div>
            @endsection