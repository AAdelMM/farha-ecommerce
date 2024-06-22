@extends('layouts.app', ['activePage' => 'courses', 'titlePage' => __('Edit requirements')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Edit requirements

            {{-- <a class="btn add-items" href="{{url('/')}}/courses/create"><i class="fa fa-plus"></i></a> --}}
            </h4>
            <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
          </div>
          <div class="card-body">
            <div class="my-form">
  
            <form method="POST" action="{{url('/')}}/requirements/{{$re->id}}" autocomplete="off" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <input type="hidden" id="id" name="id" value="{{$re->id}}"/>
                <input type="hidden" id="course_id" name="course_id" value="{{$re->course_id}}"/>
          
         <div class="form-group">
            <label for="ordering">ordering</label>
              <input type="number" name="ordering" id="ordering" placeholder="ordering" class="form-control" required="required"  autocomplete="off" value="{{$re->ordering}}"/>
           </div>
     <div class="form-group">
      <label for="item">item</label>
        <input type="text" name="item" id="item" placeholder="item" class="form-control" required="required"  autocomplete="off" value="{{$re->item}}"/>
     </div>
            <div class="row">
                        <div class="col-12 text-center">
                          <button type="submit" class="btn btn-sm btn-primary"> <i class="material-icons">edit</i> Edit requirements</button>
                        </div>
                      </div>
        </form>
        
        
        
        </div>
          </div>
        </div>
      </div>
      

      <!-- end col -->


    </div>
  </div>
</div>
@endsection