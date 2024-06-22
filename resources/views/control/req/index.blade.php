@extends('layouts.app', ['activePage' => 'courses', 'titlePage' => __('requirements')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">requirements

            <a class="btn add-items" href="{{url('/')}}/requirements/create/{{$id}}"><i class="fa fa-plus"></i></a>
            </h4>
            <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered text-center">
                <thead class=" text-primary">
                    <th>
                      ordering
                    </th>
                  <th>
                    item
                  </th>                  
                  
                  <th>
                    control
                  </th>
                </thead>
                <tbody>
@foreach ($reqs as $i)
<tr>
                    <td>
                    {{ $i->ordering }}
                    </td>
                    <td>
                    {{ $i->item }}
                    </td>
                    <td class="text-primary">
                    <a href='{{url('/')}}/requirements/{{$i->id}}/edit' class="btn btn-success"><i class="fa fa-edit"></i></a> 
                    <a href='{{url('/')}}/requirements/{{$i->id}}' class="btn btn-danger deletebtn" itemid="{{$i->id}}" link="{{url('/')}}/requirements/{{$i->course_id}}"><i class="fa fa-trash"></i></a>                 

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