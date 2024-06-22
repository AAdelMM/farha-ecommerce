@extends('layouts.app', ['activePage' => 'slider', 'titlePage' => __('Slider items')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Manage sliders

            <a class="btn add-items" href="{{url('/')}}/slider/create"><i class="fa fa-plus"></i></a>
            </h4>
            <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered text-center">
                <thead class=" text-primary">
                  <th>
                    #
                  </th>
                  <th>
                    image
                  </th>
                 
                  <th>
                    Control
                  </th>
                </thead>
                <tbody>
@foreach ($slider as $key => $i)
<tr>
                    <td>
                    {{ $key + 1 }}
                    </td>
                    <td>
                    <img src="{{url('/')}}/uploads/sliders/{{ $i->image }}" alt="slider-{{$i->id}}" height="100px"/>
                    </td>
                   
                    
                    <td class="text-primary">
                    {{-- <a href='{{url('/')}}/slider/{{$i->id}}/edit' class="btn btn-success"><i class="fa fa-edit"></i></a>  --}}

                    <a href='{{url('/')}}/slider/{{$i->id}}' class="btn btn-danger deletebtn" itemid="{{$i->id}}" link="{{url('/')}}/slider"><i class="fa fa-trash"></i></a> 
                    

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