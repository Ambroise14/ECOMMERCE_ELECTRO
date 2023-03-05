<table class="table table-bordered shadow p-3 mb-5 bg-body rounded bg-warning">
 @foreach($details as $d)
 <tr>
  <th class="bg-info text-white">Name</th>
  <td  class="float-end">{{$d->name}}</td>
  </tr>
  <tr>
  <th class="bg-info text-white">CPF</th>
  <td  class="float-end">{{$d->cpf}}</td>
  </tr>
  <tr>
  <th  class="bg-info text-white">EMAIL</th>
  <td  class="float-end">{{$d->email}}</td>
  </tr>
  <tr>
  <th  class="bg-info text-white">Endereço</th>
  <td  class="float-end">{{$d->endreco}}</td>
  </tr>
  <tr>
  <th  class="bg-info text-white">Cidade</th>
  <td  class="float-end">{{$d->cidade}}</td>
  </tr>
  <tr>
  <th  class="bg-info text-white">CEP</th>
  <td class="float-end">{{$d->cep}}</td>
  </tr>
  <th  class="bg-info text-white">Numero</th>
  <td  class="float-end">{{$d->numero}}</td>
 </tr>
 <tr>
  <th  class="bg-info text-white">Complement</th>
  <td  class="float-end">{{$d->complement}}</td>
  </tr>
  <tr>
  <th class="bg-info text-white">Estado</th>
  <td  class="float-end">{{$d->estado}}</td>
  </tr>
 @endforeach
  </table>