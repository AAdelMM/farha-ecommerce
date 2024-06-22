@extends('layouts.app', ['activePage' => 'team', 'titlePage' => __('Team members')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Team members 

            <a class="btn add-items" href="{{url('/')}}/team/create"><i class="fa fa-plus"></i></a>
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
                    Image
                  </th>
                  <th>
                    Name
                  </th>
                  <th>
                    Arabic name
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
@foreach ($team as $i)
<tr>
    <td>{{ $i->id }}</td>
    <td><img src="{{url('/')}}/uploads/team/{{ $i->image }}" alt="{{ $i->title }}" height="100px"/></td>
    <td style="max-height:100px;overflow:hidden;">{{$i->name}}</td>
    <td style="max-height:100px;overflow:hidden;">{{$i->name_ar}}</td>
    <td style="max-height:100px;overflow:hidden;">{{$i->title}}</td>
    <td style="max-height:100px;overflow:hidden;">{{$i->title_ar}}</td>
    <td class="text-primary">
    <a href='{{url('/')}}/team/{{$i->id}}/edit' class="btn btn-success"><i class="fa fa-edit"></i> Edit</a> 

    <a href='{{url('/')}}/team/{{$i->id}}' class="btn btn-danger deletebtn" itemid="{{$i->id}}" link="{{url('/')}}/team"><i class="fa fa-trash"></i> Delete</a> 
    

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