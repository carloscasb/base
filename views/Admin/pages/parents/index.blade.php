@extends('adminlte::page')

@section('title', 'pessoaos')

@section('content_header')
<ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('gerals.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('pessoas.index') }}" class="active">Perfis</a></li>
    </ol>
<h1>Vincular Pessoas</h1>
<style type="text/css">
.hidden {
    display:none;
}
input {
    display: block;
}
</style>
<script>
function mostra(id) {
     if (document.getElementById (id).style.display =='none' ){
        document.getElementById (id).style.display = 'block'
     }else {document.getElementById (id).style.display = 'none'  } 
}
</script>

<input type="button" value="+ Cadastra " onClick="mostra('cadastro')"/>
   <div id="cadastro" class="hidden">
   <div class="card">
   <div class="card-body">
            <form action="{{route('orcrims.store')}}" class="form" method="POST" >
@csrf
@include('admin.includes.alerts')

  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="inputState">MEMBRO</label>
      <select id="inputState" class="form-control" name="name">
      @foreach ($pessoas as $pessoa)
      <option selected>Choose...</option>
        <option value ="{{$pessoa->name ?? old('name')}}"> {{$pessoa->name ?? old('name')}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group col-md-3">
      <label >Sigla</label>
      <input type="text" class="form-control" name="sigla" placeholder="sigla" value="{{$pessoa->name ?? old('name')}}  ">
    </div>
    <div class="form-group col-md-2">
      <label >VÍNCULO</label>
      <select  class="form-control" name="func">
        <option selected>Sem função...</option>
        <option value="Sintonia da rua" >Comparsa</option>
        <option value="Sintonia da rua" >Advogado</option>
        <option value="Sintonia da rua" >Cunhado</option>
        <option value="Sintonia da rua" >Sintonia da rua</option>
        <option value="Geral da rua" >Geral da rua</option>
        <option value="Sintonia da gravata" >Sintonia da gravata</option>
      </select>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="inputState">MEMBRO</label>
      <select id="inputState" class="form-control" name="name">
      @foreach ($pessoas as $pessoa)
      <option selected>Choose...</option>
        <option value ="{{$pessoa->name ?? old('name')}}"> {{$pessoa->name ?? old('name')}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group col-md-3">
      <label> Estado</label>
      <input class="form-control" type="text" name="estado" placeholder="estado" value="  ">
    </div>
    </div>
    <button type="submit" class="btn btn-primary">CADASTRAR ORCRIMS</button>
 </form> 
   </div>
   </div>
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
            <div class="card-footer">
                {!! $pessoas->links() !!}
            </div>
@stop
