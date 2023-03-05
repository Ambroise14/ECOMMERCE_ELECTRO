

@extends('base')
@section('content')
<div class="container">
  <div class="row">
    <form action="{{route('distance')}}" method="post">
    @csrf
<div class="form-group">
  Name:<input type="text" name="name" class="form-control">
  Lagitude:<input type="text" name="lat" class="form-control">
  Longituse:<input type="text" name="lon" class="form-control">
 
<button class="btn btn-primary">SAVE</button>
</div>

    </form>
  </div>
</div>


@section('scripts')
<script>
$(function(){
  if(navigator.geolocation){
  navigator.geolocation.getCurrentPosition(function(position){
    alert(position.coords.longitude)
    $.post("{{route('all')}}",{lat:position.coords.latitude,lon:position.coords.longitude},(result)=>{
     $('#datav').html(result);
      })
     
  })

  }
})
</script>
@endsection
@endsection