@extends('adminlte::page')

@section('title', "PESSOAS do orcrimo {$orcrim->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('pessoas.index') }}" class="active">Pessoas</a></li>
    </ol>

    <h1>PESSOAS da orcrim <strong>{{ $orcrim->name }}</strong></h1>
    
    <a href=" {{ route('orcrims.membros.acesso', $orcrim->id) }} " class="btn btn-dark">ADD NOVA PERMISSÃO</a>

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
                            <a href="{{ route('orcrims.membros.acesso', $orcrim->id) }}" ><i class="fas fa-user-secret"></i></a>
                              
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