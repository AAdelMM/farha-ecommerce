<div class="col-12 text-right mb-10 d-block pb-2">
 
    <h1>
      New order
    </h1>
    <a rel="tooltip" class="btn btn-info" href="#" data-original-title="Done" title="Done">
        order Num: 55{{$order[0]->id}}
      </a>
  </div>
  <h3 class="bg-primary text-center card-header-success p-1 mt-5 mb-2">Products</h3>
  <div class="table-responsive">
    <table class="table border table-bordered table-striped text-center">
      <thead class="bg-primary text-white card-header-primary">
        <tr>
          <th scope="col">sku</th>
          <th scope="col">count</th>
          <th scope="col">size</th>
          <th scope="col">product</th>
          <th scope="col">price</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $key => $p)
        <tr>
          <td>{{$p->sku}}</td>
          <td>{{$p->count}}</td>
          <td>{{$p->size}}</td>
          <td><a href="{{url('/')}}/products/{{$p->slug}}" target="_blank">{{$p->product_name}}</a></td>
          <td>{{$p->count * $p->price}} EGP</td>
        </tr>
       @endforeach
      </tbody>
    </table>
    <table class="table border table-bordered table-striped text-center">
      <thead class="bg-primary text-white card-header-primary">
        <h3 class="bg-primary text-center card-header-success p-1 mt-5 mb-2">Personal & order info</h3>
        <tr>
          <th scope="col">Cust name</th>
          <th scope="col">email</th>
          <th scope="col">phone</th>
          {{-- <th scope="col">shipping cost</th> --}}
          <th scope="col">products total</th>
          @if(!is_null($order[0]->coupon))
          <th scope="col">coupon applied</th>
          @endif
          <th scope="col">order total</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{$order[0]->name}}</td>
          <td>{{$order[0]->email}}</td>
          <td>{{$order[0]->phone}}</td>
          {{-- <td>{{$order[0]->shipping_rate}}</td> --}}
          <td>{{$order[0]->order_total}} EGP</td>
          @if(!is_null($order[0]->coupon))
          <td>{{$order[0]->percentage}}</td>
          @endif
          
          <td>
            @if(!is_null($order[0]->coupon))
            <?php $cut = $order[0]->order_total / 100 * $order[0]->percentage;
            $tot = $order[0]->order_total - $cut;
             echo $tot; ?>
            @else
            {{$order[0]->order_total}}
            @endif
             EGP</td>
        </tr>
      </tbody>
    </table>
    <table class="table border table-bordered table-striped text-center">
      <thead class="bg-primary text-white card-header-primary">
        <h3 class="bg-primary text-center card-header-success p-1 mt-5 mb-2">Shipping address</h3>
        <tr>
          <th scope="col">gov</th>
          <th scope="col">city</th>
          <th scope="col">address</th>
          <th scope="col">postal code</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{$order[0]->gov}}</td>
          <td>{{$order[0]->city}}</td>
          <td>{{$order[0]->address}}</td>
          <td>{{$order[0]->postal}}</td>
        </tr>
      </tbody>
    </table> 
  