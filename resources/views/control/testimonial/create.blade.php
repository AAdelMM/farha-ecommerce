@extends('layouts.app', ['activePage' => 'testimonial', 'titlePage' => __('Testimonials')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Testimonials</h4>
            <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
          </div>
          <div class="card-body">
            <div class="my-form">
  
            <form method="POST" action="{{url('/')}}/testimonial" autocomplete="off" enctype="multipart/form-data">
            @csrf
         <div class="form-group">
          <label for="image">image</label>
           <input type="file" name="image" id="image" placeholder="image" class="form-control" required="required" autocomplete="off"/>
         </div>
          
         <div class="form-group">
            <label for="name">Name</label>
              <input type="text" name="name" id="name" placeholder="Name" class="form-control" required="required"  autocomplete="off"/>
           </div>
           <div class="form-group">
            <label for="name_ar">Arabic name</label>
              <input type="text" name="name_ar" id="name_ar" placeholder="Arabic name" class="form-control" required="required"  autocomplete="off"/>
           </div>

           
         <div class="form-group">
          <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="Title" class="form-control" required="required"  autocomplete="off"/>
         </div>
         <div class="form-group">
          <label for="title_ar">Arabic title</label>
            <input type="text" name="title_ar" id="title_ar" placeholder="Arabic title" class="form-control" required="required"  autocomplete="off"/>
         </div>
         <div class="form-group">
            <label for="text">text</label>
              <input type="text" name="text" id="text" placeholder="text" class="form-control" required="required"  autocomplete="off"/>
           </div>
           <div class="form-group">
            <label for="text_ar">Arabic text</label>
              <input type="text" name="text_ar" id="text_ar" placeholder="Arabic text" class="form-control" required="required"  autocomplete="off"/>
           </div>
            <div class="row">
                        <div class="col-12 text-center">
                          <button type="submit" class="btn btn-sm btn-primary"> <i class="material-icons">add</i> Add new testimonial</button>
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