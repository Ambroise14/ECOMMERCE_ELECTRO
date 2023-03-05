<button class="btn btn-danger new-add-adress">Add new Adress</button><br>
<div class="row" style="margin-top:20px">
  @foreach($data  as $position=> $item)
  <div class="col-sm-4 @if($item->statut==1)  @endif"  style="border-style:dotted double;height:120px;">
    <div class="card" style="margin-left:20px">
      <div class="card-header"  style="font-size:12px"><p><i class="fa fa-user" aria-hidden="true"></i>{{$item->newname}}<br><i class="fa fa-phone-square" aria-hidden="true"></i>{{$item->telephone}}</p></div>
      <div class="card-bordy" style="font-size:12px">
       <p><i class="fa fa-map-marker" aria-hidden="true"></i>{{$item->endreco}} {{$item->numero}}<br>
       {{$item->cidate}} ,{{$item->cep}} {{$item->estado}},{{'Brasil'}}
      
      </p>
      </div>
    </div>
  </div>
  @endforeach
</div>
un instant 