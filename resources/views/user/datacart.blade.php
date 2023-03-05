

<div class="container">
@if(isset($data) && count($data)>0)
  
<h1>Meu carrinho de compras</h1>
  <div class="row">
<div class="col-sm-8 col-md-6 col-lg-8" style="background-color:yellosw;">
   @foreach($data as $c)
   <div class="panel panel-default" style="width:100%">
      <div class="panel-body">
        <div class="col-sm-2 col-md-2">
        <img src="{{asset('image/product/'.$c->product->image)}}" alt="" height="50px" width="100px">

        </div>
        <div class="col-sm-4">
          <span>{{$c->product->name}}</span>
          <p style="color:red">RS:{{$c->product->desconte()}}    <del class="product-old-price">$ {{$c->product->price}}</del></p>
        </div>

        <div class="col-sm-6">
           <div class="btn-group" style="margin-left:40%">
                  <button type="button" class="btn btn-info btna" style="border:0px;height:32px" vaue-cart_id="{{$c->id}}" data-decision="0"> <i class="fa fa-minus" aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-secondary" style="border:0px;height:32px">{{$c->quantity}}</button>
                  <button type="button" class="btn btn-primary btna" style="border:0px;height:32px"  vaue-cart_id="{{$c->id}}" data-decision="1"> <i class="fa fa-plus" aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-danger removecart" style="border:0px;height:32px" data-cart_id="{{$c->id}}"><i class="fa fa-remove" aria-hidden="true">remove</i></button>
              </div>
        </div>
      </div>
     </div>
   @endforeach
</div>
    <div class="col-sm-4">
    <div class="panel panel-default" style="width:100%;height:30%">
        <div class="panel-body" style="width:90%;height:30%">
        <table class="table table-boredered">
          <tr>
            <th>Total:</th>
            <td>RS:{{$total}}</td>
          </tr>
          <tr>
            <th>desconte:</th>
            <td style="color:red">{{'0%'}}</td>
          </tr>
          <tr>
            <th>Total a pagar:</th>
            <td><strong>RS: {{$total}}</strong></td>
          </tr>

          <tr>
            <th></th>
            <td><strong><a href="{{route('pagar')}}">
            <button class="btn btn-danger form-control" style="width:220px">Contitnue</button>
            </a></strong></td>
          </tr>
          
        </table>
         
        </div>
   </div>
    </div>
  </div>
@else
<div class="panel panel-default">
  <div class="panel-body"><h2 class="text-center">opaaa!!!!!! Seu carrinho esta vazio   <a href="{{route('/')}}">Ver os melhores produtos aqui</a></h2></div>
</div>
@endif
</div>