


<div class="modal fade bb" id="alertcart" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true" style="margin-top:200px;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Um novo item foi adicionado ao seu carrinho de compras. Você tem <span class="cosuntcarto"></span> itens no seu carrinho de compras</h4>
      </div>
      <div class="modal-body" id="showmodal" style="border-style:dotted">
      <div class="btn-group btn-group-lg">
        <a href="{{route('showcart')}}"  class="btn btn-primary">ir para o carrinho</a>
        <a href="{{route('/')}}"  class="btn btn-danger" style="margin-left:430px">continue comprando</a>

    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


