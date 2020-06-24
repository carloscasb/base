@extends('adminlte::page')

@section('title', " {$pessoa->name} " )

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('pessoas.index') }}">Perfis</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('pessoas.orcrims', $pessoa->id) }}" class="active">Planos</a></li>
    </ol>

    <h1> <strong>{{ $pessoa->name }}</strong> é integrante da ORCRIM abaixo:</h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orcrims as $orcrim)
                        <tr>
                            <td>
                                {{ $orcrim->name }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('orcrims.pessoa.detach', [$orcrim->id, $pessoa->id]) }}" class="btn btn-danger">DESVINCULAR</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $orcrims->appends($filters)->links() !!}
            @else
                {!! $orcrims->links() !!}
            @endif
        </div>
    </div>
@stop