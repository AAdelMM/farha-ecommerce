@extends('layouts.app', ['activePage' => 'nav', 'titlePage' => __('Nav items')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Navigation links

            <a class="btn add-items" href="{{url('/')}}/nav/create"><i class="fa fa-plus"></i></a>
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
                    Name
                  </th>
                  <th>
                    Arabic name
                  </th>
                  <th>
                    URL
                  </th>
                  <th>
                    Control
                  </th>
                </thead>
                <tbody>
@foreach ($nav_items as $i)
<tr>
                    <td>
                    {{ $i->id }}
                    </td>
                    <td>
                    {{ $i->nav_item }}
                    </td>
                    <td>
                    {{ $i->nav_item_ar }}
                    </td>
                    <td>
                    {{ $i->url }}
                    </td>
                    <td class="text-primary">
                    <a href='{{url('/')}}/nav/{{$i->id}}/edit' class="btn btn-success"><i class="fa fa-edit"></i> Edit</a> 

                    <a href='{{url('/')}}/nav/{{$i->id}}' class="btn btn-danger deletebtn" itemid="{{$i->id}}" link="{{url('/')}}/nav"><i class="fa fa-trash"></i> Delete</a> 
                    

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