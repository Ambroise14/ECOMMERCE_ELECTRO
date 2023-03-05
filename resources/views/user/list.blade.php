@extends('base')
@section('content')
<div class="col-md-6 offset-md-3">
  <table class="table table-bordered shadow p-3 mb-5 bg-body rounded">
    <thead>
      <tr>
        <th>Order Date</th>
        <th>Status</th>
        <th>Total</th>
        <th>view</th>
      </tr>
    </thead>
    <tbody>
      @if(isset($users) && count($users)>0)
      @foreach($users as $item)
      <tr>
        <td>{{$item->name}}</td>
        <td>{{$item->cpf}}</td>
        <td>{{$item->email}}</td>
        <td><button class="btn btn-info btn-p" data-bs-toggle="modal" data-bs-target="#details" value-user_id="{{$item->id}}">show</button></td>
      </tr>
      @endforeach
      @endif
    </tbody>
  </table>
</div>


<div class="modal" tabindex="-1" id="details">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center">Details Endereço User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="regiana"></p>
      </div>
  
    </div>
  </div>
</div>

@section('scripts')
<script>
  $(document).on('click','.btn-p',function(){
    let user_id=$(this).attr('value-user_id');
    $.post("{{route('details_endereco_user')}}",{user_id:user_id},(result)=>{
      $("#regiana").html(result);
    })
  })
</script>
@endsection
@endsection