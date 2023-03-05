<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>@yield('title')</title>

 		<!-- Google font -->
 		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

 		<!-- Bootstrap -->
 		<link type="text/css" rel="stylesheet" href="{{asset('luana/css/bootstrap.min.css')}}"/>

 		<!-- Slick -->
 		<link type="text/css" rel="stylesheet" href="{{asset('luana/css/slick.css')}}"/>
 		<link type="text/css" rel="stylesheet" href="{{asset('luana/css/slick-theme.css')}}"/>

 		<!-- nouislider -->
 		<link type="text/css" rel="stylesheet" href="{{asset('luana/css/nouislider.min.css')}}"/>

 		<!-- Font Awesome Icon -->
 		<link rel="stylesheet" href="{{asset('luana/css/font-awesome.min.css')}}">

 		<!-- Custom stlylesheet -->
 		<link type="text/css" rel="stylesheet" href="{{asset('luana/css/style.css')}}"/>

 		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
 		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
 		<!--[if lt IE 9]>
 		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
 		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 		<![endif]-->
@yield('css')
    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container-fluid">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
						<li><a href="{{route('historico')}}"><i class="fa fa-map-marker"></i>Meus pedidos</a></li>
					</ul>
					<ul class="header-links pull-right">
						<li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
					  @if(Auth::check())
						<li><a href="{{route('optionsp')}}"><i class="fa fa-user-o"  data-toggle="collapse" href="#demop"></i>{{Auth::user()->name}}</a></li>
						<li><a href="{{route('user.logout')}}"><i class="fa fa-user-o"  data-toggle="collapse" href="#collapse1"></i> Sair</a></li>
						@else
						<li><a href="{{route('user.logar')}}"><i class="fa fa-user-o"  data-toggle="collapse" href="#collapse1"></i>Login</a></li>
						@endif
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="{{route('/')}}" class="logo">
									<img src="{{asset('luana/./img/logo.png')}}" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								  <input class="form-control" placeholder="Search here" id="mots">
                  <span id="datafilter" style="margin-left:0px"></span>
     
						
							</div>
            
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Your Wishlist</span>
										<div class="qty">2</div>
									</a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
                <div class="dropdown" id="carts">
                  
									

                  </div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
					<li class="active"><a href="{{route('/')}}">Home</a></li>
						@if(isset($listcategory) && count($listcategory)>0)
						@foreach($listcategory as $cat)
						<li><a href="{{route('filter_category_select',['category_id'=>$cat->id])}}">{{$cat->name}}</a></li>
						
						@endforeach
						@endif
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<!-- BREADCRUMB -->

		<!-- /BREADCRUMB -->

		<!-- SECTION -->
			<!-- container -->
			<div class="container-fluid">
        @include('sessions.modal')
        @include('sessions.alertcart')
				@include('sessions.historicomodal')

				<!-- row -->
				<div class="row">
				@if($message=Session::get('success'))
     <div class="col-sm-6 col-sm-offset-3">
      <div class="alert alert-info">{{$message}}</div>
    </div>
    @endif

    @if($message=Session::get('danger'))
    <div class="col-sm-6 col-sm-offset-3">
      <div class="alert alert-danger">{{$message}}</div>
    </div>
    @endif
          @yield('content')
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		<!-- /SECTION -->

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">About Us</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
									<li><a href="#">Hot deals</a></li>
									<li><a href="#">Laptops</a></li>
									<li><a href="#">Smartphones</a></li>
									<li><a href="#">Cameras</a></li>
									<li><a href="#">Accessories</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Information</h3>
								<ul class="footer-links">
									<li><a href="#">About Us</a></li>
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">Orders and Returns</a></li>
									<li><a href="#">Terms & Conditions</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Service</h3>
								<ul class="footer-links">
									<li><a href="#">My Account</a></li>
									<li><a href="#">View Cart</a></li>
									<li><a href="#">Wishlist</a></li>
									<li><a href="#">Track My Order</a></li>
									<li><a href="#">Help</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>


						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
		<script src="{{asset('luana/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('luana/js/slick.min.js')}}"></script>
		<script src="{{asset('luana/js/nouislider.min.js')}}"></script>
		<script src="{{asset('luana/js/jquery.zoom.min.js')}}"></script>
		<script src="{{asset('luana/js/main.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    @yield('scripts')
		<script>
  function showcart(){
    $.get("{{route('datacart')}}",{},(result)=>{
      $('#table').html(result);
    })
  }

	function countcart(){
    $.get("{{route('countcart')}}",{},(result)=>{
      $('.cosuntcart').html(result);
    })
  }
</script>
<script>
  $(document).on('click','.btna',function(){
    var cart_id=$(this).attr('vaue-cart_id');
    var decision=$(this).attr('data-decision');
     $.post("{{route('updatecart')}}",{cart_id:cart_id,d:decision},(result)=>{
      showcart()
     })
  })

  $(document).on('click','.removecart',function(){
    var cart_id=$(this).attr('data-cart_id');
     $.post("{{route('removecart')}}",{cart_id:cart_id},(result)=>{
       showcart()
     })
  })
</script>
<script>
  $(function(){
    showcart()
  })
</script>
    <script>
      $(document).on('click','.quick-view',function(){
        var id=$(this).attr('data-val-id');
      $.post("{{route('showmodal')}}",{product_id:id},(result)=>{
        $('#showmodal').html(result);
        $('#largeModal').modal('show')
      })
      })
    </script>

<script>
  $('.btn-addd').on('click',function(){
      var id=$(this).attr('value-id');
      $.post("{{route('filter')}}",{category_id:id},(result)=>{
      $('#remove').html(result);
      })
    })
</script>



<script>
$(function(){
$('#mots').on('keyup click',function(){
  var mots=$(this).val();
  $.post("{{route('seach')}}",{mots:mots},(result)=>{
  $('#datafilter').html(result)
}) 
})
})
</script>

<script>
  $(document).on('click','.deletecart',function(){
var cart_id=$(this).attr('data-cart_id');
  $.post("{{route('deleteitemcart')}}",{cart_id:cart_id},(result)=>{
    show()
    getTotal()
      })
  })
</script>
<script>
  function show(){
    $.get("{{route('cartdata')}}",{},(result)=>{
      $('#carts').html(result)
    })
  }
  function showcart(){
    $.get("{{route('datacart')}}",{},(result)=>{
      $('#table').html(result);
    })
  }

  function getTotal(){
    $.get("{{route('getTotal')}}",{},(result)=>{
      $('#total').text("Total Cart :"+ " "+result.data +".00")
      $('.countcart').text(result.count)
     
    })
  }
</script>
<script>
    function redirectcartegorie(am){ window.location=am.value;}
    function changeimage(image){
      var container=document.getElementById('modop');
      container.src=image.src;
    }
</script>

<script>
  $(document).on('click change','btn-addd .input-select',function(){
      var id=$(this).attr('value-id');
      var limit=$(this).val();
      alert(limit);
      $.post("{{route('filter')}}",{category_id:id},(result)=>{
      $('#luana').html(result);
      })
    })

</script>
<script>
  function ambroise(img){
    var container=document.getElementById("modop");
    container.src=img.src;
  }
</script>
<script>
  $(document).on('click','.btn-add',function(){
  var product_id=$(this).attr('value-id');
  $.post("{{route('addtocart')}}",{product_id:product_id},(result)=>{
		$('.cosuntcarto').text('12');

    if(result.status=="200"){
      jQuery('#alertcart').modal('show');
			$('.cosuntcarto').text(result.count);
      show()
       getTotal()
    }
     if(result.status=='400'){
      window.location.href="{{route('user.logar')}}";
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

<script>
  $(document).on('click','.btn-p',function(){
    let order_id=$(this).attr('value-order_id');
    let ref=$(this).attr('value-ref');
    let statut=$(this).attr('value-decision');
    $('.REF').text('PEDIDO REF:'+' '+ref);

    $('.decision').text(statut);
    $.post("{{route('details_order')}}",{order_id:order_id},(result)=>{
      $("#regiana").html(result);
    })
  })
</script>

<script>
	$(document).on('click','.new-add-adress',function(){
		$.get("{{route('add-new-adress')}}",{},(result)=>{
      $('.datasp').html(result)
    })
	})
</script>

<script>
	function showadresse(){
		$(document).on('click','.adresse',function(){
  $.get("{{route('getAdresse')}}",{},(result)=>{
    $('.datasp').html(result);
  })
 })
	}
function addnewadresse(){
let formData = new FormData($('#newadresse')[0]);
$('.name').html("");
$.ajax({
    url: "{{route('add-new-adressdata')}}",
    type: 'post',
    data: formData,
    processData: false,
    contentType: false,
		success:function(result){
		if(result.status==400){
			$('.name').html(result.message)
		}else if(result.status==401){
			$('.cpf').html(result.message)
		}else if(result.status==402){
			$('.cep').html(result.message)
		}else if(result.status==403){
			$('.numero').html(result.message)
		}else if(result.status==404){
			$('.estado').html(result.message)
		}else if(result.status==405){
			$('.cidade').html(result.message)
		}
	
		}
})

}
</script>
<script>
  $(function(){
		showadresse()
    show()
    getTotal()
		showcart()
	

  })
</script>

<script>
	$(function(){
		$('[data-toggle="popover"]').popover();  
	})
</script>


	</body>
</html>
