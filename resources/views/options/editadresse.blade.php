@extends('base2')
@section('css')
<style>
  body{
    background-color:#999999;
  }
</style>
@endsection
@section('content')

<div class="col-sm-6 col-sm-offset-3 newadresse">
<div class="panel panel-default">
  <div class="panel-body">
  <form id="newadresse" method="post" action="{{route('editadresse',['idadresse'=>$data->id])}}">
    @csrf
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          Name:
          <input type="text" name="name" value="{{$data->newname}}" class="form-control">
     
          <span class="text-danger name"></span>
        
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          CPF:
          <input type="text" name="cpf" value="{{$data->cpf}}" class="form-control">
       
          <span class="text-danger cpf"></span>
      
        </div>
      </div>
      <div class="col-sm-12">
        <div class="form-group">
          TELEFONE:
          <input type="text" name="telephone" value="{{$data->telephone}}" class="form-control">
          <span class="text-dange telephoner"></span>
        </div>
      </div>
     
  
      <div class="col-sm-12">
        <div class="form-group">
          Endereço:
          <input type="text" name="endreco" value="{{$data->endreco}}" class="form-control">
        
          <span class="text-danger endreco"></span>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="form-group">
          Cidade:
          <input type="text" name="cidade" value="{{$data->cidade}}" class="form-control">
          <span class="text-danger cidade"></span>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          CEP:
          <input type="text" name="cep" value="{{$data->cep}}" class="form-control">
          <span class="text-danger cep"></span>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="form-group">
          Numero:
          <input type="text" name="numero" value="{{$data->numero}}" class="form-control">
          <span class="text-danger numero"></span>
        </div>
      </div>
      <div class="col-sm-9">
        <div class="form-group">
          Complement:
          <input type="text" name="complement" value="{{$data->complement}}" class="form-control">
       
        </div>
      </div>

      
      <div class="col-sm-12">
        <div class="form-group">
          estado:
          <input type="text" name="estado" value="{{$data->estado}}" class="form-control">
          <span class="text-danger estado"></span>
       
        </div>
        <button class="btn btn-success mt-2" type="submit">save</button>
      </div>

    </div>
  </form>


  </div>
</div>
</div>
@endsection


























