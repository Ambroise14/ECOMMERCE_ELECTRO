@extends('base2')
@section('css')
<style>
  body{
    background:gray;
  }
</style>
@endsection
@section('content')
<div class="col-sm-6 col-sm-offset-3">
<div class="panel panel-default">
  <div class="panel-heading"><h2>Cadastro</h2></div>
  <div class="panel-body">
  <form action="{{route('user.methodes')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          Name:
          <input type="text" name="name" value="{{old('name')}}" class="form-control">
          @error('name')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          CPF:
          <input type="text" name="cpf" value="{{old('cpf')}}" class="form-control">
          @error('cpf')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
      </div>
      <div class="col-sm-12">
        <div class="form-group">
          TELEFONE:
          <input type="text" name="telephone" value="{{old('telephone')}}" class="form-control">
          @error('telephone')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          E-mail:
          <input type="email" name="email" value="{{old('email')}}" class="form-control">
          @error('email')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          Senha:
          <input type="password" name="password" value="{{old('password')}}" class="form-control">
          @error('password')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
      </div>
      <div class="col-sm-12">
        <div class="form-group">
          Endereço:
          <input type="text" name="endreco" value="{{old('endreco')}}" class="form-control">
          @error('endreco')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
      </div>

      <div class="col-sm-6">
        <div class="form-group">
          Cidade:
          <input type="text" name="cidade" value="{{old('cidade')}}" class="form-control">
          @error('cidade')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          CEP:
          <input type="text" name="cep" value="{{old('cep')}}" class="form-control">
          @error('cep')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
      </div>
      <div class="col-sm-3">
        <div class="form-group">
          Numero:
          <input type="text" name="numero" value="{{old('numero')}}" class="form-control">
          @error('numero')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
      </div>
      <div class="col-sm-9">
        <div class="form-group">
          Complement:
          <input type="text" name="complement" value="{{old('cep')}}" class="form-control">
       
        </div>
      </div>

      

      <div class="col-sm-12">
        <div class="form-group">
          estado:
          <input type="text" name="estado" value="{{old('estado')}}" class="form-control">
       
        </div>
        <button class="btn btn-success mt-2" type="submit">save</button>
      </div>

    </div>
  </form>
  </div>
</div>

</div>
@endsection