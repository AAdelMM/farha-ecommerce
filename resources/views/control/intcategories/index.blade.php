@extends('layouts.app', ['activePage' => 'interior-cat', 'titlePage' => __('Interior Categories')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Interior Categories

            <a class="btn add-items" href="{{url('/')}}/interior-cat/create"><i class="fa fa-plus"></i></a>
            </h4>
            <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered text-center">
                <thead class=" text-primary">
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
@foreach ($categories as $i)
<tr>
    <td style="max-height:100px;overflow:hidden;">{{$i->name}}</td>
    <td style="max-height:100px;overflow:hidden;">{{$i->name_ar}}</td>
    <td class="text-primary">

    <a href='{{url('/')}}/interior-cat/{{$i->id}}' class="btn btn-danger deletebtn" itemid="{{$i->id}}" link="{{url('/')}}/interior-cat"><i class="fa fa-trash"></i> Delete</a> 
    

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