@extends('base2')
@section('css')
<style>
  body{
    background:gray;
  }
</style>
@endsection
@section('content')
<div class="col-sm-6 col-sm-offset-3 shadow-none p-3 mb-5 bg-light rounded">
<div class="panel panel-default">
  <div class="panel-body">
  <form action="{{route('user.logar')}}" method="post">
    @csrf
    <div class="row">
   
      <div class="col-sm-12">
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
          Senha:
          <input type="password" name="password" value="{{old('password')}}" class="form-control">
          @error('password')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
      <p>  <button class="btn btn-success mt-2" type="submit">save</button>  <a href="{{route('user.methodes')}}" class=" mt-2" style="margin-left:60%">criar conta</a></p>

      </div>


    </div>
  </form>
  </div>
</div>

</div>
@endsection