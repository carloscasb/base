@extends('adminlte::page')

@section('title', 'PESSOASdisponíveis para o orcrimo {$orcrim->name}')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('orcrims.index') }}">ORCRIM</a></li>
        <li class="breadcrumb-item"><a href="{{ route('orcrims.pessoas', $orcrim->id) }}">Perfis</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('orcrims.pessoas.available', $orcrim->id) }}" class="active">Disponíveis</a></li>
    </ol>

    <h1>PESSOASdisponíveis para o orcrimo <strong>{{ $orcrim->name }}</strong></h1>

@stop

@section('content')
<div class="card">
        <div class="card-header">
        <form action="{{ route('membros.orcrim.store', $orcrim->id) }}" class="form" method="POST" >
        @csrf
@include('admin.includes.alerts')
  <div class="form-row">
  <div class="form-group col-md-3">
      <label >ORCRIM</label>
      <input type="text" class="form-control" id="orcrim_id"  name="orcrim_id"  value="{{ $orcrim->name  }}">
    </div>
    <div class="form-group col-md-3">
      <label for="inputCity">ID ORCRIM</label>
      <input type="text" class="form-control" id="orcrim_id"  vname="orcrim_id"  value="{{ $orcrim->id }}">
    </div>
    
    <div class="form-group col-md-6">
      <label for="inputState">MEMBRO</label>
      <select id="inputState" class="form-control" name="name">
      @foreach ($pessoas as $pessoa)
      <option selected>Choose...</option>
        <option value ="{{$pessoa->name ?? old('name')}}"> {{$pessoa->name ?? old('name')}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-3">
      <label for="inputState">FUNÇÂO</label>
      <select id="inputState" class="form-control">
        <option selected>Sem função...</option>
        <option value="Sintonia da rua" >Sintonia da rua</option>
        <option value="Geral da rua" >Geral da rua</option>
        <option value="Sintonia da gravata" >Sintonia da gravata</option>
      </select>
    </div>
    <div class="form-group col-md-3">
        <label for="inputAddress">LIDERANÇA</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" value="{{ $pessoa->name}}">
    </div>
    </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">QUEBRADA</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">PADRINHO</label>
      <select id="inputState" class="form-control">
      @foreach ($pessoas as $pessoa)
      <option selected>Sem padrinho...</option>
        <option value ="{{$pessoa->name }}"> {{ $pessoa->name }}</option>
        @endforeach
      </select>
    </div>
   </div>
   <div class="form-row">
   <div class="form-group col-md-2">
      <label for="inputCity">DATA FILIAÇÂO</label>
      <input type="text" class="form-control" id="inputCity" >
    </div>

    <div class="form-group col-md-2">
      <label for="inputCity">LOCAL DE FILIAÇÃO</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputCity">AREA DE ATUAÇÃO</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
   </div>
   <div class="form-row">
   <div class="form-group col-md-2">
      <label for="inputCity">OBSERVAÇÂO</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
       </div>
  <button type="submit" class="btn btn-primary">INSERIR/CADASTRAR</button>
</form>
</div>
 </div>
         

    

         
       
        
    <div class="card">
        <div class="card-header">
            <form action="{{route('orcrims.pessoas.available', $orcrim->id)}}" method="POST" class="form form-inline">
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
                <form action="{{ route('orcrims.membros.attach', $orcrim->id) }}" method="POST">
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

                                <button type="submit" class="btn btn-success">TIRAR</button>
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