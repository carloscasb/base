@extends('adminlte::page')

@section('title', "Pessoas ligadas  {$orcrim->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('orcrims.index') }}" class="active">Orcrims</a></li>
    </ol>

    <h1>Pessoas com ligação <strong>{{ $orcrim->name }}</strong></h1>
    <a href="{{ route('orcrims.pessoas.available', $orcrim->id)}}" class="btn btn-dark">ADD NOVA PESSOA</a>

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
                    @foreach ($pessoas as $pessoa)
                        <tr>
                            <td>
                                {{ $pessoa->name }}
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
                {!! $pessoas->appends($filters)->links() !!}
            @else
                {!! $pessoas->links() !!}
            @endif
        </div>
    </div>
@stop