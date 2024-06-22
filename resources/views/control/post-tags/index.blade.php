@extends('layouts.app', ['activePage' => 'postags', 'titlePage' => __('Posts tags')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Post tags

            <a class="btn add-items" href="{{url('/')}}/postags/create"><i class="fa fa-plus"></i></a>
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
                    Tag
                  </th>
                  <th>
                    Arabic Tag
                  </th>
                  <th>
                    Control
                  </th>
                </thead>
                <tbody>
@foreach ($post_tag as $i)
<tr>
                    <td>
                    {{ $i->id }}
                    </td>
                    <td>
                    {{ $i->tag }}
                    </td>
                    <td>
                    {{ $i->tag_ar }}
                    </td>
                    
                    <td class="text-primary">
                    <a href='{{url('/')}}/postags/{{$i->id}}/edit' class="btn btn-success"><i class="fa fa-edit"></i> Edit</a> 

                    <a href='{{url('/')}}/postags/{{$i->id}}' class="btn btn-danger deletebtn" itemid="{{$i->id}}" link="{{url('/')}}/postags"><i class="fa fa-trash"></i> Delete</a> 
                    

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