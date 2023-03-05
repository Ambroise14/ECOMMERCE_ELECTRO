@extends('base2')
@section('title')HOME @endsection
@section('content')
<div class="col-sm-3">
<div class="panel panel-default">
  <div class="panel-heading">Options Rapides</div>
  <div class="panel-body">
  <div class="list-group">
  <a class="list-group-item active adresse">Adresse de livraison</a>
  <a class="list-group-item pedidos">pedidos</a>
  <a class="list-group-item home">Home</a>
</div>
  </div>
</div>

</div>

<div class="col-sm-9 datasp">

</div>
          
          
@section('scripts')
<script>

 $(document).on('click','.pedidos',function(){
  $.get("{{route('getorder')}}",{},(result)=>{
    $('.datasp').html(result);
  })
 })
 $(document).on('click','.home',function(){
  $('.datasp').text(`
  Sobre
  Onika Tanya Maraj-Petty, conhecida por seu nome artístico Nicki Minaj, é uma rapper, cantora, compositora, modelo e atriz trinidiana radicada nos Estados Unidos. Wikipédia
  Nascimento: 8 de dezembro de 1982 (idade 39 anos), Saint James, Porto da Espanha, Trindade e Tobago
  Cônjuge: Kenneth Petty (desde 2019)
  Irmãos: Ming Maraj, Jelani Maraj, Brandon Lamar, Makiya Maraj
  Pais: Robert Maraj, Carol Maraj
  Gravadoras: Universal Republic Records, MAIS
  Prêmios: MTV Video Music Award: Prêmio Michael Jackson de Vanguarda, MAIS
  `);
 })
</script>
<script>
  $(function(){
    $('.datasp').text(`
  Sobre
  Onika Tanya Maraj-Petty, conhecida por seu nome artístico Nicki Minaj, é uma rapper, cantora, compositora, modelo e atriz trinidiana radicada nos Estados Unidos. Wikipédia
  Nascimento: 8 de dezembro de 1982 (idade 39 anos), Saint James, Porto da Espanha, Trindade e Tobago
  Cônjuge: Kenneth Petty (desde 2019)
  Irmãos: Ming Maraj, Jelani Maraj, Brandon Lamar, Makiya Maraj
  Pais: Robert Maraj, Carol Maraj
  Gravadoras: Universal Republic Records, MAIS
  Prêmios: MTV Video Music Award: Prêmio Michael Jackson de Vanguarda, MAIS
  `);
  })
</script>
@endsection
@endsection
