<div class="aside">
							<h3 class="aside-title">Top selling</h3>
						
              @foreach($status as $s)
              <div class="product-widget"  style="top:-20px">
							<a href="{{route('description',['id'=>$s->id])}}">
								<div class="product-img">
									<img src="{{asset('image/product/'.$s->image)}}" alt="{{$s->name}}">
								</div>
								<div class="product-body" style="margin-top:10px">
									<h3 class="product-name" style="margin-top:50px"><a href="{{route('description',['id'=>$s->id])}}">{{$s->name}}</a></h3>
									<h4 class="product-price">RS {{$s->desconte()}}.00 <del class="product-old-price">RS {{$s->price}}.00</del></h4>
                  </a>
								</div>
						
							</div>
              @endforeach

						
						</div>