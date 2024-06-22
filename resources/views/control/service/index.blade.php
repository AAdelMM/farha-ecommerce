@extends('layouts.app', ['activePage' => 'service', 'titlePage' => __('service items')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Manage Services

            <a class="btn add-items" href="{{url('/')}}/service/create"><i class="fa fa-plus"></i></a>
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
                    image
                  </th>
                  {{-- <th>
                    icon
                  </th> --}}
                  <th>
                    title
                  </th>    
                  <th>
                    Arabic title
                  </th>                  
                  <th>
                    text
                  </th>
                  <th>
                    Arabic text
                  </th>               
                  <th>
                    Control
                  </th>
                </thead>
                <tbody>
@foreach ($service as $i)
<tr>
                    <td>
                    {{ $i->ordering }}
                    </td>
                    <td>
                    <img src="{{url('/')}}/uploads/service/{{ $i->image }}" alt="service-{{$i->ordering}}" height="100px"/>
                    </td>
                    {{-- <td>
                    <i class="{{ $i->icon }}"></i>
                    </td> --}}
                    <td>
                    {{ $i->title }}
                    </td>
                    <td>
                    {{ $i->title_ar }}
                    </td>
                    <td>
                    {{ $i->text }}
                    </td>
                    <td>
                    {{ $i->text_ar }}
                    </td>
                    
                    <td class="text-primary">
                    <a href='{{url('/')}}/service/{{$i->id}}/edit' class="btn btn-success"><i class="fa fa-edit"></i></a> 

                    <a href='{{url('/')}}/service/{{$i->id}}' class="btn btn-danger deletebtn" itemid="{{$i->id}}" link="{{url('/')}}/service"><i class="fa fa-trash"></i></a> 
                    

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