@extends('base2')
@section('css')
<style>
  body{
    background-color:#999999;
  }
</style>
@endsection
@section('content')
<div id="table">
</div>

@section('scripts')
<script>
  function showcart(){
    $.get("{{route('datacart')}}",{},(result)=>{
      $('#table').html(result);
    })
  }
</script>
<script>
  $(document).on('click','.btnaa',function(){
    var cart_id=$(this).attr('vaue-cart_id');
    var decision=$(this).attr('data-decision');
     $.post("{{route('updatecart')}}",{cart_id:cart_id,d:decision},(result)=>{
      showcart()
     })
  })

  $(document).on('click','.removecart',function(){
    var cart_id=$(this).attr('vaue-cart_id');
    var decision=$(this).attr('data-decision');
     $.post("{{route('removecart')}}",{cart_id:cart_id,d:decision},(result)=>{
      showcart()
     })
  })
</script>
<script>
  $(function(){
    showcart()
  })
</script>
@endsection
@endsection