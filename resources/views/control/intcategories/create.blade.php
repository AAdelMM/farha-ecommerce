@extends('layouts.app', ['activePage' => 'interior-cat', 'titlePage' => __('interior categories')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">interior categories</h4>
            <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
          </div>
          <div class="card-body">
            <div class="my-form">
  
            <form method="POST" action="{{url('/')}}/interior-cat" autocomplete="off" enctype="multipart/form-data">
            @csrf
          
         <div class="form-group">
            <label for="name">Title</label>
              <input type="text" name="name" id="name" placeholder="Title" class="form-control" required="required"  autocomplete="off"/>
           </div>
           <div class="form-group">
            <label for="name_ar">Arabic title</label>
              <input type="text" name="name_ar" id="name_ar" placeholder="Arabic title" class="form-control" required="required"  autocomplete="off"/>
           </div>

           
           <div class="row">
                        <div class="col-12 text-center">
                          <button type="submit" class="btn btn-sm btn-primary"> <i class="material-icons">add</i> Add new category</button>
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