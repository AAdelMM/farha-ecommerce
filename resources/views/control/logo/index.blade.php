@extends('layouts.app', ['activePage' => 'logo', 'titlePage' => __('Logo items (Partners)')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Logo items (Partners)

            <a class="btn add-items" href="{{url('/')}}/logo/create"><i class="fa fa-plus"></i></a>
            </h4>
            <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered text-center">
                <thead class=" text-primary">
                  <th>
                    Ordering
                  </th>
                  <th>
                    Image
                  </th>
                  <th>
                    Title
                  </th>
                  <th>
                    Arabic title
                  </th>
                  <th>
                    Control
                  </th>
                </thead>
                <tbody>
@foreach ($logo as $i)
<tr>
    <td>{{ $i->ordering }}</td>
    <td><img src="{{url('/')}}/uploads/logo/{{ $i->image }}" alt="{{ $i->title }}" height="100px"/></td>
    <td style="max-height:100px;overflow:hidden;">{{$i->title}}</td>
    <td style="max-height:100px;overflow:hidden;">{{$i->title_ar}}</td>
    <td class="text-primary">

    <a href='{{url('/')}}/logo/{{$i->id}}' class="btn btn-danger deletebtn" itemid="{{$i->id}}" link="{{url('/')}}/logo"><i class="fa fa-trash"></i> Delete</a> 
    

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