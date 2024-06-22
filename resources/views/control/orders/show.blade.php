@extends('layouts.app', ['activePage' => 'orders', 'titlePage' => __('orders')])

@section('content')

    <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">orders</h4>
            </div>
            <div class="card-body">
                              <div class="row">
                <div class="col-12 text-right mb-10 d-block pb-2">
                  @if($order->status == 0) 
                  <a rel="tooltip" class="btn btn-info" href="#">
                    <i class="material-icons">rectangle</i>
                    order Num: 55{{$order->id}}
                  </a>
                  <a rel="tooltip" class="btn btn-info confirm" href="{{url('/')}}/orders/{{$order->id}}" data-original-title="Order shipped" title="Order shipped">
                    <i class="material-icons">check</i>
                    Order shipped ?
                  </a>
                  @else
                  <a rel="tooltip" class="btn btn-info" href="#" data-original-title="Done" title="Done">
                    <i class="material-icons">rectangle</i>
                    order Num: 55{{$order->id}}
                  </a>
                  <a rel="tooltip" class="btn btn-success" href="#" data-original-title="Done" title="Done">
                    <i class="material-icons">check</i>
                    Order done
                  </a>
                  
                   @endif
              </div>
              <div class="table-responsive">
                <table class="table border table-bordered table-striped text-center">
                  <h3 class="bg-primary text-center card-header-success p-1 mt-5 mb-2">Products</h3>
                  <thead class="bg-primary text-white card-header-primary">
                    <tr>
                      <th scope="col"><div id="SKU">SKU</div></th>
                      <th scope="col">count</th>
                      <th scope="col">size</th>
                      <th scope="col">color</th>
                      <th scope="col">image</th>
                      <th scope="col">sticker</th>
                      <th scope="col">print</th>
                      <th scope="col">product</th>
                      <th scope="col">price</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($products as $key => $p)
                    <tr>
                      <th scope="row">{{$p->sku}}</th>
                      <td>{{$p->count}}</td>
                      <td>{{$p->size}}</td>
                      <td>{{$p->color}}</td>
                      <td style="position:relative;width:60px" class="popup_this" p-name="{{$p->product_name}}">
                        <img src="{{url('/')}}/uploads/{{$p->avatar}}" style="position:absolute;width:50px;top:0;right:0;">
                        @foreach($images as $key1 => $i)
                          @if ($key1 == $p->id)
                            @foreach ($i as $ii)
                              <img src="{{url('/')}}/uploads/{{$ii}}" style="position:absolute;width:50px;top:0;right:0;">
                            @endforeach
                          @endif
                        @endforeach
                      </td>
                      <td>{{$p->sticker_name}}</td>
                      <td><a href="{{url('/')}}/uploads/{{$p->sticker_image}}" download><img src="{{url('/')}}/uploads/{{$p->sticker_image}}" style="height:50px"/></a></td>
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
                      <th scope="col">shipping cost</th>
                      <th scope="col">products total</th>
                      <th scope="col">After coupon</th>
                      <th scope="col">order total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>{{$order->name}}</td>
                      <td>{{$order->email}}</td>
                      <td>{{$order->phone}}</td>
                      <td>{{$order->shipping_rate}}</td>
                      <td>{{$order->order_total}} EGP</td>
                      <td>
                        @if(!is_null($order->coupon))
                        <?php $cut = $order->order_total / 100 * $order->percentage;
                              $tot = $order->order_total - $cut; 
                              echo $tot;
                         ?>
                        @else
                        {{$order->order_total + $order->shipping_rate}}
                        @endif
                        EGP</td>
                      <td>
                        @if(!is_null($order->coupon))
                        {{$tot}}
                        @else
                        {{$order->order_total + $order->shipping_rate}}
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
                      <td>{{$order->gov}}</td>
                      <td>{{$order->city}}</td>
                      <td>{{$order->address}}</td>
                      <td>{{$order->postal}}</td>
                    </tr>
                  </tbody>
                </table> 
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 90%;margin: 0 auto;width: 250px;height: 250px;position: relative;background: #FFF;">
    <div class="modal-content">
      
    </div>
  </div>
</div>

 @endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.0/html2canvas.min.js"></script>
<script>
$(".popup_this").click(function(){
  pop = $(this).html();
  p_name = $(this).attr('p-name') + 'png';
$("#popup .modal-content").html(pop);
$('#popup').modal('show')
$('#popup .modal-content img').attr('style', 'position:absolute;width:250px;top:0;right:0;')
//         setTimeout(() => {
//           html2canvas($("#popup .modal-content")[0]).then((canvas) => {
//                 theCanvas = canvas;


//                 // canvas.toBlob(function(blob) {
//                 //     saveAs(blob, "Dashboard.png"); 
//                 // });
                
// $("#popup .modal-content").html(canvas);
//     });
//         }, 500);
})
  </script>
@endpush