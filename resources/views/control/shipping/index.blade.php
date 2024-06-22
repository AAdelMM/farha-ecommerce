@extends('layouts.app', ['activePage' => 'shipping', 'titlePage' => __('shipping')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">shipping 

            <a class="btn add-items" href="{{url('/')}}/shipping/create"><i class="fa fa-plus"></i></a>
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
                    Gov
                  </th>
                  <th>
                    Rate
                  </th>
                  <th>
                    Control
                  </th>
                </thead>
                <tbody>
@foreach ($shipping as $key=> $i)
<tr>
    <td>{{ $key + 1 }}</td>
    <td style="max-height:100px;overflow:hidden;">{{$i->gov_name}}</td>
    <td style="max-height:100px;overflow:hidden;">{{$i->shipping_rate}}</td>
    <td class="text-primary">
    <a href='{{url('/')}}/shipping/{{$i->id}}/edit' class="btn btn-success "><i class="fa fa-edit"></i> Edit</a> 
    <a href='{{url('/')}}/shipping/{{$i->id}}' class="btn btn-danger deletebtn" itemid="{{$i->id}}" link="{{url('/')}}/shipping"><i class="fa fa-trash"></i> Delete</a> 
    

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