@extends('base2')
@section('title')HOME @endsection
@section('content')
<div id="aside" class="col-md-3">
	        @include('sessions.verticalproduct')
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Categories</h3>
							<div class="checkbox-filter">
              @if(isset($category) && count($category)>0)
							<input type="checkbox" id="category-1" value="0" value-id="0" class="btn-addd">
              Todo
             @foreach($category as $cat)
								<div class="input-checkboxe">
									<input type="checkbox" id="category-1" value="{{$cat->id}}" value-id="{{$cat->id}}" class="btn-addd">
									<label for="category-1" class="btn-addd">
										<span></span>
										{{$cat->name}}
										<small>({{App\Models\product::where('category_id',$cat->id)->count()}})</small>
									</label>
								</div>

                @endforeach
              @endif
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
            <div id="slider" class="mt-5 vn"></div><br/>
              Range: <span id='range' class="bg text-white" style="background-color:red"></span>

                <hr>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Brand</h3>
							<div class="checkbox-filter">
								<div class="input-checkbox">
									<input type="checkbox" id="brand-1">
									<label for="brand-1">
										<span></span>
										SAMSUNG
										<small>(578)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-2">
									<label for="brand-2">
										<span></span>
										LG
										<small>(125)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-3">
									<label for="brand-3">
										<span></span>
										SONY
										<small>(755)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-4">
									<label for="brand-4">
										<span></span>
										SAMSUNG
										<small>(578)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-5">
									<label for="brand-5">
										<span></span>
										LG
										<small>(125)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-6">
									<label for="brand-6">
										<span></span>
										SONY
										<small>(755)</small>
									</label>
								</div>
							</div>
						</div>
				
					</div>

          <div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Sort By:
									<select class="input-select">
										<option value="0">Popular</option>
										<option value="1">Position</option>
									</select>
								</label>

								<label>
									Show:
									<select class="input-select">
										<option value="6">6</option>
										<option value="12">12</option>
									</select>
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div>
						<!-- /store top filter -->

						<!-- store products -->
			<div class="row" id="remove">
					
						@include('sessions._product')
						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">Showing 20-100 products</span>
							<ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
						<!-- /store bottom filter -->
					</div>

          
@section('scripts')

@endsection
@endsection