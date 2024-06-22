@extends('layouts.app', ['activePage' => 'coupons', 'titlePage' => __('coupons')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">coupons 

            <a class="btn add-items" href="{{url('/')}}/coupons/create"><i class="fa fa-plus"></i></a>
            </h4>
            <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered text-center">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    coupon
                  </th>
                  <th>
                    Percentage
                  </th>
                  <th>
                    Usage
                  </th>
                  <th>
                    end date
                  </th>
                  <th>
                    Control
                  </th>
                </thead>
                <tbody>
@foreach ($coupons as $key => $i)
<tr>
    <td>{{ $key + 1 }}</td>
    <td style="max-height:100px;overflow:hidden;">{{$i->coupon}}</td>
    <td style="max-height:100px;overflow:hidden;">{{$i->percentage}} %</td>
    <td style="max-height:100px;overflow:hidden;">{{$i->c_usage}} Orders</td>
    <td style="max-height:100px;overflow:hidden;">{{$i->valid_until}}</td>
    <td class="text-primary">
      <a rel="tooltip" href="{{url('/')}}/coupons/{{$i->id}}/edit" class="btn btn-success" data-original-title="edit" title="edit">
        <i class="material-icons">edit</i>
        <div class="ripple-container"></div>
      </a>
      <form method="POST" action="{{url('/')}}/coupons/{{$i->id}}" style="display:inline-block;" onSubmit="if(!confirm('Delete?')){return false;}">
        @csrf
        @method('delete')

        <input type="hidden" name="id" id="id" value="{{$i->id}}" />
        <button type="submit" rel="tooltip" class="btn btn-danger" data-original-title="delete" title="delete">
          <i class="material-icons">delete</i>
          <div class="ripple-container"></div>
        </button>
      </form>   
     
    </td>
  </tr>
@endforeach 
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      

      <!-- end col -->


    </div>
  </div>
</div>
@endsection