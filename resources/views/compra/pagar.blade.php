@extends('base2')
@section('css')
<style>
  body{
    background:gray;
  }
</style>
@endsection
@section('content')

<div class="col-sm-6 col-sm-offset-3">
<div class="panel panel-default">
  <p><strong>Shipping Address</strong></p>
  <div class="panel-body">
  @foreach($adressepadraos as $adressepadrao)
  <p><span>{{$adressepadrao->newname}}  {{'+55'.$adressepadrao->telephone}}</span></p>
    <p><span>{{$adressepadrao->endreco}} , {{$adressepadrao->cidade}}</span>   
  
    <p><span>{{$adressepadrao->estado}} , {{$adressepadrao->complement}} ,{{$adressepadrao->cep}}</span></p>
    <a href="{{route('showadresse',['idadresse'=>$adressepadrao->id])}}">
    <button class="btn btn-primary">change</button>
    </a>
  @endforeach

  </div>

  </p>
</div>
</div>

<div class="col-sm-6 col-sm-offset-3">
<div id="loading" style="display:none"><img src="{{asset('image/Pi5r5.gif')}}"></div>
<div class="panel panel-default">
  <div class="panel-body">
    
<input type="hidden" name="hasheller" class="hasheller">
<input type="hidden" name="bandeira" class="bandeira">
 <div class="row">
  
 <div class="col-sm-12">
    Numero cartão
    <input type="text" name="numero" class="numero form-control" value="4111111111111111">
  </div>
  <div class="col-sm-6">
 cvv
    <input type="text" name="cvv" class="cvv form-control" value="123">
  </div>
  <div class="col-sm-6">
Mes expiração
    <input type="text" name="mesexp" class="mesexp form-control" value="12">
  </div>
  <div class="col-sm-6">
    Ano expiração
    <input type="text" name="anoexp" class="anoexp form-control" value="2030">
  </div>
  <div class="col-sm-6">
Parcela
    <input type="text" name="parcela" class="parcela form-control">
  </div>
  <div class="col-sm-12">
  Nome Cartão
    <input type="text" name="nome" class="nome form-control">
  </div>

  <div class="col-sm-6">
   Total
    <input type="text" name="total" class="total form-control" value="{{$total}}">
  </div>
 
  <div class="col-sm-3">
   Valor da parcela
    <input type="text" name="totalparcela" class="totalparcela form-control">
  </div>
  <div class="col-sm-3">
   Total a pagar
    <input type="text" name="totalapagar" class="totalapagar form-control">
    

  </div>
  <button class="btn btn-primary  pagar mt-2" style="margin-top: 10px;margin-left:10px">pagar</button>

 </div>
  </div>
</div>

</div>


@section('scripts')
<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<script>
 const vr=true;


    function charger(){
        PagSeguroDirectPayment.setSessionId('{{$identifiant}}')
    }
    $(function(){
      charger();
      $('.numero').on('blur',function(){
        PagSeguroDirectPayment.onSenderHashReady(function(response){
            if(response.status=="error"){
              console.log(response.message)
              return false;
            }
            var hash=response.senderHash;
            $('.hasheller').val(hash);

        })
        $('.bandeira').val("")
        let ncartao =$(this).val();
        if(ncartao.length > 6){
          let prefixcartao=ncartao.substr(0,6);
          PagSeguroDirectPayment.getBrand({
            cardBin:prefixcartao,
            success:function(response){
              $('.bandeira').val(response.brand.name);
            },
            error:function(response){
              alert("O numero de cartao invalido");
            }
          })
        }
      })

      $('.parcela').on('blur',function(){
      var bandeira=$('.bandeira').val();
      var totalparcela=$(this).val();
      if(bandeira==""){
        alert("preencha o numero de cartão valido")
        return
      }
       PagSeguroDirectPayment.getInstallments({
        amount:$('.total').val(),
        maxInstallmentsNoiterest:2,
        brand:bandeira,
        success:function(response){
          console.log(response);
          let status=response.error;
          if(status){
            return;
          }
          let index=totalparcela-1;
          let totalapagar=response.installments[bandeira][index].totalAmount;
          let valor=response.installments[bandeira][index].installmentAmount;
          $('.totalapagar').val(totalapagar);
          $('.totalparcela').val(valor);
        }
       })
      })
      $('.pagar').on('click',function(){
       
        var numerocartao=$('.numero').val()
        var iniciocartao=numerocartao.substr(0,6)
        var cvv=$('.cvv').val()
        var mesexp=$('.mesexp').val()
        var anoexp=$('.anoexp').val()
        var hasheller=$('.hasheller').val()
        var bandeira=$('.bandeira').val()
        PagSeguroDirectPayment.createCardToken({
          cardNumber:numerocartao,
          brand:bandeira,
          cvv:cvv,
          expirationMonth:mesexp,
          expirationYear:anoexp,
          success:function(response){
            $.post("{{route('pagar')}}",
            {
              hasheller:hasheller,
              cardtoken:response.card.token,
              parcela:$('.parcela').val(),
              totalapagar:$('.totalapagar').val(),
              totalparcela:$('.totalparcela').val(),

            },(result)=>{
              
              $('#loading').hide();
            })
          },
          error:function(error){
            console.log(error)
          }
        })
        if(vr){
        $('#loading').show();
       }
      })
    })
</script>

@endsection
@endsection


