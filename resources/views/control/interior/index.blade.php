@extends('layouts.app', ['activePage' => 'interior', 'titlePage' => __('Interior images')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Interior images

            <a class="btn add-items" href="{{url('/')}}/interior/create"><i class="fa fa-plus"></i></a>
            </h4>
            <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered text-center">
                <thead class=" text-primary">
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
                    category id
                  </th>
                  <th>
                    Control
                  </th>
                </thead>
                <tbody>
@foreach ($interior as $i)
<tr>
    <td><img src="{{url('/')}}/uploads/interior/{{ $i->image }}" alt="{{ $i->name }}" height="100px"/></td>
    <td style="max-height:100px;overflow:hidden;">{{$i->name}}</td>
    <td style="max-height:100px;overflow:hidden;">{{$i->name_ar}}</td>
    <td style="max-height:100px;overflow:hidden;">{{$i->category_id}}</td>
    <td class="text-primary">

    <a href='{{url('/')}}/interior/{{$i->id}}' class="btn btn-danger deletebtn" itemid="{{$i->id}}" link="{{url('/')}}/interior"><i class="fa fa-trash"></i> Delete</a> 
    

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