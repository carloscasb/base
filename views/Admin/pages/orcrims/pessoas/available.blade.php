@extends('adminlte::page')

@section('title', 'PESSOASdisponíveis para o orcrimo {$orcrim->name}')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('orcrims.index') }}">ORCRIM</a></li>
        <li class="breadcrumb-item"><a href="{{ route('orcrims.pessoas', $orcrim->id) }}">membros</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('orcrims.pessoas.available', $orcrim->id) }}" class="active">Disponíveis</a></li>
    </ol>

    <h1>PESSOASdisponíveis para o orcrimo <strong>{{ $orcrim->name }}</strong></h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('orcrims.pessoas.available', $orcrim->id)}} " method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th width="50px">#</th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                <form action="{{ route('orcrims.pessoas.attach', $orcrim->id) }}" method="POST">
                        @csrf

                        @foreach ($pessoas as $pessoa)
                            <tr>
                                <td>
                                    <input type="checkbox" name="pessoas[]" value="{{ $pessoa->id }}">
                                </td>
                                <td>
                                    {{ $pessoa->name }}
                                </td>
                            </tr>
                        @endforeach

                        <tr>
                            <td colspan="500">
                                @include('admin.includes.alerts')

                                <button type="submit" class="btn btn-success">Vincular</button>
                            </td>
                        </tr>
                    </form>
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