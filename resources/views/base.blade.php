<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
  rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <title>Document</title>
  <style>


  </style>
</head>
<body>

  @include('sessions.nav')
  <div class="container mt-4">
    @if($message=Session::get('success'))
    <div class="col-md-6 offset-md-3">
      <div class="alert alert-info">{{$message}}</div>
    </div>
    @endif

    @if($message=Session::get('danger'))
    <div class="col-md-6 offset-md-3">
      <div class="alert alert-danger">{{$message}}</div>
    </div>
    @endif
    <div class="row">

      @yield('content')
    </div>
  </div>

  <div class="offcanvas offcanvas-end" id="demo">
  <div class="offcanvas-header">
    <h1 class="offcanvas-title">Heading</h1>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body pb">
  <div class="shadow-sm p-3 mb-5 bg-body rounded text-center">
    @foreach($datapanier as $p)
    <img src="{{asset('image/product/'.$p->product->image)}}" width="70px" height="70px">
    @endforeach
  </div>
  </div>
</div>

<div class="container-fluid mt-3">


</div>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

 @yield('scripts')
 <script>
$(function(){
$('#mots').on('keyup',function(){
  var mots=$(this).val();
if(mots!=""){
  $.post("{{route('seach')}}",{mots:mots},(result)=>{
  $('#datafilter').html(result)

})
}
  
})
})
</script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

</body>
</html>