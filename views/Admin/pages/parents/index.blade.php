@extends('adminlte::page')

@section('title', 'pessoaos')

@section('content_header')
<ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('gerals.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('pessoas.index') }}" class="active">Perfis</a></li>
    </ol>
<h1>Vincular Pessoas  </h1>
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
            <form action="{{route('parents.store')}}" class="form" method="POST" >
@csrf
@include('admin.includes.alerts')

  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="inputState">Pessoa 1</label>
      <select id="inputState" class="form-control" name="parent_id">
      @foreach ($pessoas as $pessoa)
      <option selected>Choose...</option>
        <option value ="{{$pessoa->id ?? old('id')}}"> {{$pessoa->name ?? old('name')}}</option>
        @endforeach
      </select>
    </div>
   
    <div class="form-group col-md-2">
      <label >VÍNCULO</label>
      <select  class="form-control" name="name">
        <option selected>Indefindo</option>
        <option value="Comparsa da rua" >Comparsa</option>
        <option value="Advogado" >Advogado</option>
        <option value="Cunhado" >Cunhado</option>
        <option value="Sintonia da rua" >Sintonia da rua</option>
        <option value="Geral da rua" >Geral da rua</option>
        <option value="Sintonia da gravata" >Sintonia da gravata</option>
      </select>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="inputState">Pessoa 2</label>
      <select id="inputState" class="form-control" name="pessoa_id">
      @foreach ($pessoas as $pessoa)
      <option selected>Choose...</option>
        <option value ="{{$pessoa->id ?? old('id')}}"> {{$pessoa->name ?? old('name')}}</option>
        @endforeach
      </select>
    </div>
    
    </div>
    <button type="submit" class="btn btn-primary">VINCULAR PESSOAS</button>
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
                    <th>Vínculo</th>
                    <th>Id da Pessoa 1</th>
                     <th style="width: 100px">Pessoa 2</th>

                </tr>

            </thead>
            <body>
            @foreach($parent as $parent)
           
                 <tr>
                    <td>{{ $parent->name }}</td>
                    <td>{{ $parent->pessoa_id }}</td>
                    <td>
                    <a href="url" class="btn btn-warning">{{ $parent->parent_id }}</a>
                    </td>
                    </tr>
                @endforeach
               
            </body>
        </table>
       
    
                </div>
            </div>
            <div class="card-footer">
               
               
            </div>
@stop
