@extends('layouts.app', ['activePage' => 'team', 'titlePage' => __('Team members')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Team members</h4>
            <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
          </div>
          <div class="card-body">
            <div class="my-form">
  
            <form method="POST" action="{{url('/')}}/team/{{$team->id}}" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="put" />
            <input type="hidden" name="id" id="id" value="{{$team->id}}"/>
         <div class="form-group">
            <label for="name">Name</label>
              <input type="text" name="name" id="name" placeholder="Name" class="form-control" required="required"  autocomplete="off" value="{{$team->name}}"/>
           </div>
           <div class="form-group">
            <label for="name_ar">Arabic name</label>
              <input type="text" name="name_ar" id="name_ar" placeholder="Arabic name" class="form-control" required="required"  autocomplete="off"value="{{$team->name_ar}}"/>
           </div>

           
         <div class="form-group">
            <label for="title">Title</label>
              <input type="text" name="title" id="title" placeholder="Title" class="form-control" required="required"  autocomplete="off" value="{{$team->title}}"/>
           </div>
           <div class="form-group">
            <label for="title_ar">Arabic title</label>
              <input type="text" name="title_ar" id="title_ar" placeholder="Arabic title" class="form-control" required="required"  autocomplete="off" value="{{$team->title_ar}}"/>
           </div>
            <div class="row">
                        <div class="col-12 text-center">
                          <button type="submit" class="btn btn-sm btn-primary"> <i class="material-icons">edit</i> Edit team member</button>
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