@extends('base2')
@section('content')
<div class="col-sm-6 col-sm-offset-3">
  <div class="form-grup">
    <input type="text" placeholder="enter you seach" class="form-control myInput" id="myInput">
  </div>
  <table class="table table-bordered shadow p-3 mb-5 bg-body rounded mt-4 myTable" id="myTable">
    <thead>
      <tr>
      <th>Reference Order</th>
        <th>Order Date</th>
        <th>Status</th>
        <th>Total</th>
        <th>view</th>
      </tr>
    </thead>
    <tbody>
      @if(isset($orders) && count($orders)>0)
      @foreach($orders as $item)
      <tr>
      <td>{{$item->order_ref}}</td>
        <td>{{$item->orderdate}}</td>
        <td>{{$item->status}}</td>
        <td>{{$item->total}}</td>
        <td>
          <button class="btn btn-info btn-p" data-toggle="modal"
         data-target="#details" value-ref="{{$item->order_ref}}" value-order_id="{{$item->id}}" value-decision="{{$item->decision()}}">show</button>
        
        </td>
      </tr>
      @endforeach
      @endif
    </tbody>
  </table>
</div>

@section('scripts')


@endsection
@endsection