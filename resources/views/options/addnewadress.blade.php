
<div class="col-sm-6 col-sm-offset-3 newadresse">
  <form id="newadresse">
    @csrf
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          Name:
          <input type="text" name="name" value="{{old('name')}}" class="form-control">
     
          <span class="text-danger name"></span>
        
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          CPF:
          <input type="text" name="cpf" value="{{old('cpf')}}" class="form-control">
       
          <span class="text-danger cpf"></span>
      
        </div>
      </div>
      <div class="col-sm-12">
        <div class="form-group">
          TELEFONE:
          <input type="text" name="telephone" value="{{old('telephone')}}" class="form-control">
          <span class="text-dange telephoner"></span>
        </div>
      </div>
     
  
      <div class="col-sm-12">
        <div class="form-group">
          Endereço:
          <input type="text" name="endreco" value="{{old('endreco')}}" class="form-control">
        
          <span class="text-danger endreco"></span>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="form-group">
          Cidade:
          <input type="text" name="cidade" value="{{old('cidade')}}" class="form-control">
          <span class="text-danger cidade"></span>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          CEP:
          <input type="text" name="cep" value="{{old('cep')}}" class="form-control">
          <span class="text-danger cep"></span>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="form-group">
          Numero:
          <input type="text" name="numero" value="{{old('numero')}}" class="form-control">
          <span class="text-danger numero"></span>
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
          <span class="text-danger estado"></span>
       
        </div>
        <button class="btn btn-success mt-2" type="button" onclick="addnewadresse()">save</button>
      </div>

    </div>
  </form>
</div>
