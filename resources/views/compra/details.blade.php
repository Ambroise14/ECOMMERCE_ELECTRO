<table class="table table-bordered shadow p-3 mb-5 bg-body rounded bg-warning">
    <thead class="bg-danger text-white">
      <tr>
        <th>Name</th>
        <th>valor</th>
        <th>Quantity</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody class="bg-warningy">
      @php $total=0;@endphp
      @if(isset($details) && count($details)>0)
      @foreach($details as $item)
      <tr>
        <td>{{$item->name}}</td>
        <td>{{$item->valor}}</td>
        <td>{{$item->quantity}}</td>
        <td>{{$item->valor*$item->quantity}}</td>
      </tr>
      @php $total+=$item->valor*$item->quantity;@endphp
      @endforeach
      @endif
    </tbody>
    <tfoot class="bg-dark text-white">
      <tr>
        <td colspan="3"><strong>Total:.........................................................................</strong></td>
        <td><strong>R$:{{$total}}.00</strong></td>
      </tr>
    </tfoot>
  </table>