@extends('base2')
@section('content')
<div class="col-xs-3">
@include('sessions.verticalproduct')

</div>
<div class="col-xs-9">
  <div class="row">
@if(isset($cat) && count($cat)>0)
    @foreach($cat as $item)
    <a href="{{route('description',['id'=>$item->id])}}">
    <div class="col-md-4 col-xs-10">
        <div class="product">
          <div class="product-img">
            <img src="{{asset('image/product/'.$item->image)}}" alt="" height="340px">
            <div class="product-label">
              <span class="sale">-30%</span>
            </div>
          </div>
          <div class="product-body">
            <p class="product-category">Category:{{$item->category->name}}</p>
            <h3 class="product-name"><a href="#">{{$item->nmae}}</a></h3>
            <h4 class="product-price">RS {{$item->desconte()}}.00 <del class="product-old-price">RS {{$item->price}}.00</del></h4>
            <div class="product-rating">
            </div>
            <div class="product-btns">
              <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
              <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
              <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
            </div>
          </div>
          <div class="add-to-cart">
            <button class="add-to-cart-btn btn-add" value-id="{{$item->id}}"><i class="fa fa-shopping-cart"></i> add to cart</button>
          </div>
        </div>
      </div>
    </a>
    @endforeach
    @endif

  </div>
</div>


@endsection