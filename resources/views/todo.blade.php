@extends('base')
@section('content')
<div id="datav"></div>
@endsection


@section('scripts')

 
<script>
$(function(){
  if(navigator.geolocation){
  navigator.geolocation.getCurrentPosition(function(position){
  
    $.post("{{route('all')}}",{lat:position.coords.latitude,lon:position.coords.longitude},(result)=>{
     console.log(result);
      })
     
  })

  }
})
</script>
@endsection
