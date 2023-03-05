   
 <div class="panel panel-default">
<img id="modop"src="{{asset('image/product/'.$show->image)}}" height="350px" width="845px" onchange="ambroise(this)">

  <div class="panel-body">
           
  @foreach($show->images as $img)
        <img src="{{asset('image/product/'.$img->name)}}" height="60px" width="60px" class="p">
        @endforeach
  </div>
</div>