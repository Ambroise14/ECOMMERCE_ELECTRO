<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty countcart">0</div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list" id="nik">
                       @foreach($data as $item)
                       <div class="product-widget">
												<div class="product-img">
													<img src="{{asset('image/product/'.$item->product->image)}}" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">{{$item->product->name}}</a></h3>
													<h4 class="product-price"><span class="qty">{{$item->quantity}}x</span>$ {{$item->product->desconte()}}</h4>
												</div>
												<button class="delete deletecart" data-cart_id="{{$item->id}}"><i class="fa fa-close">f</i></button>
									</div>
                       @endforeach
                    </div>
										<div class="cart-summary">
											<small class="cosuntcart"></small>
											<h5 id="total">SUBTOTAL: $2940.00</h5>
										</div>
										<div class="cart-btns">
											<a href="{{route('showcart')}}">View Cart</a>
											<a href="{{route('pagar')}}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
						