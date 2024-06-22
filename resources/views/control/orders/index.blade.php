@extends('layouts.app', ['activePage' => 'orders', 'titlePage' => __('orders')])

@section('content')

    <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h5 class="card-title ">search by order number</h5>
            </div>
            <div class="card-body">
              <form action="{{url('/')}}/process" method="post" class="p-2 mt-3 mb-3">
                @csrf
                <div class="row">
                  <div class="col-md-8 col-12">
                    <input type="number" id="order" name="order" placeholder="#order" class="form-control"/>
                  </div>
                  <div class="col-md-4 col-12">
                    <button type="submit" class="btn btn-success">Jump to order</button>
                  </div>
                </div>
                </form>
            </div>
            
            <div class="card-header card-header-primary">
              <h4 class="card-title d-block w-100">orders

              <a href="{{url('/')}}/orders?status=0" class="btn btn-info pull-right mr-1">Pending</a>
              <a href="{{url('/')}}/orders?status=1" class="btn btn-info pull-right mr-1">Done</a>
              <a href="{{url('/')}}/orders?status=2" class="btn btn-info pull-right mr-1">cancelled</a>
              </h4>
              
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table border table-bordered text-center">
                  <thead class=" text-primary">
                    <tr>
                      <th>
                        orderNum
                    </th>
                    <th>
                      name
                  </th>
                  <th>
                      gov
                    </th>
                    <th>
                      city
                    </th>
                    <th>
                      phone
                    </th>
                    <th>
                      Coupon
                    </th>
                    <th>
                      total
                    </th>
                    <th>
                      status
                    </th>

                    <th>
                      Received / Handled
                    </th>
                    
                    <th class="">
                      Actions
                    </th>
                  </tr></thead>
                  <tbody>


                      @foreach ($orders as $c)

                      <tr>
                        <td>55{{$c->id}}</td>
                        <td>{{$c->name}}</td>
                       
                        <td>{{$c->gov}}</td>
                       
                        <td>{{$c->city}}</td>
                       
                        <td>{{$c->phone}}</td>
                        <td>{{$c->coupon}}</td>
                        <td>
                          @if(!is_null($c->coupon))
                          <?php $cut = $c->order_total / 100 * $c->percentage;
                                $tot = $c->order_total - $cut;
                                echo $tot ;
                                ?>
                          @else
                          {{$c->order_total}}
                          @endif
                          EGP</td>

                        <td>@if ($c->status == 0)
                          Pending...
                          @elseif($c->status == 1)
                          Done <i class="fa fa-check btn-success"></i>
                          @elseif($c->status == 2)
                          Cancelled <i class="fa fa-trash btn-danger"></i>
                        @endif</td>
                       
                        <td>
                          @if ($c->status == 0)
                          {{date('D M Y | H:i', strtotime($c->created_at))}}
                          @else
                          {{date('D M Y | H:i', strtotime($c->updated_at))}}
                        @endif
                        </td>
                         <td class="td-actions">
                            <a rel="tooltip" class="btn btn-info" href="{{url('/')}}/orders/{{$c->id}}/show" data-original-title="Show order" title="Show order">
                                <i class="material-icons">bubble_chart</i>
                                <div class="ripple-container"></div>
                            </a>

                           @if ($c->status == 0)
                           <a rel="tooltip" class="btn btn-success confirm" href="{{url('/')}}/orders/{{$c->id}}" data-original-title="done" title="done">
                            <i class="material-icons">done</i>
                            <div class="ripple-container"></div>
                          </a>
                          <a href='{{url('/')}}/cancel-order/{{$c->id}}' class="btn btn-danger deletebtn" itemid="{{$c->id}}" link="{{url('/')}}/orders"><i class="fa fa-trash"></i> Cancel</a> 
    
                           @endif

                                            
                       </td>

                      </tr>

                      @endforeach


                  </tbody>
                </table>
 
 <div class="pagination">
   
   {{ $orders->withQueryString()->links() }}

 </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
 @endsection

@push('js')
  <script>
    // $(document).ready(function() {
    //   // Javascript method's body can be found in assets/js/demos.js
    //   md.initDashboardPageCharts();
    // });
  </script>
@endpush