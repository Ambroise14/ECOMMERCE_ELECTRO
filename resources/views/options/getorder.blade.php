@if(isset($data) && count($data)>0)
@foreach($data as $order)
<div class="panel panel-default>
  <div class="panel-body">
    <p>Numero Pedido : <strong>{{$order->order_ref}}</strong> Total: <strong>{{$order->total}}</strong> Date Order: <strong>{{$order->orderdate}}</strong>
    <button class="btn btn-info btn-p" data-toggle="modal"
         data-target="#details" value-ref="{{$order->order_ref}}" value-order_id="{{$order->id}}" value-decision="{{$order->decision()}}">Details Order</button>
  </p>
    <p></p>
  </div>
</div>
@endforeach
@endif