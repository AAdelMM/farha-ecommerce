@extends('layouts.app', ['activePage' => 'phone', 'titlePage' => __('phone')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">phone 

            <a class="btn add-items" href="{{url('/')}}/phone/create"><i class="fa fa-plus"></i></a>
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
                    phone
                  </th>
                  <th>
                    Control
                  </th>
                </thead>
                <tbody>
@foreach ($phone as $i)
<tr>
    <td>{{ $i->id }}</td>
    <td style="max-height:100px;overflow:hidden;">{{$i->phone}}</td>
    <td class="text-primary">
    <a href='{{url('/')}}/phone/{{$i->id}}' class="btn btn-danger deletebtn" itemid="{{$i->id}}" link="{{url('/')}}/phone"><i class="fa fa-trash"></i> Delete</a> 
    

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