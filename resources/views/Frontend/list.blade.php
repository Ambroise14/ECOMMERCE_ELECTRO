@extends('base2')
@section('content')
<div class="col-2" style="font-size:10px">
  @if(isset($category) && count($category)>0)
  <li class="list-group-item btn-addd" value-id="0"> <a href="#">TODO</a></li>

  @foreach($category as $cart)

  <ul class="list-group">
  
  <li class="list-group-item btn-addd" value-id="{{$cart->id}}"><a href="#">{{$cart->name}}</a></li>
 
</ul>
  @endforeach
  @endif
</div>
<div class="col-10 body" id="luana">
  @include('sessions._product')
</div>

@section('scripts')
<script>
  $('.btn-addd').on('click',function(){
      var id=$(this).attr('value-id');
      $.post("{{route('filter')}}",{category_id:id},(result)=>{
      $('#luana').html(result);
      })
    })
</script>

<script>
  $(document).on('click','.btn-addd',function(){
  var product_id=$(this).attr('value-id');
  $.post("{{route('addtocart')}}",{product_id:product_id},(result)=>{
    if(result.status=="200"){
     window.location.href="{{route('showcart')}}"
    }
     if(result.status=='400'){
      window.location.href="{{route('user.logar')}}";
     }
      })
  })
</script>
<script>
  function showcart(){
    
  }
</script>
@endsection
@endsection