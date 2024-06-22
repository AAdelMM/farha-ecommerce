@extends('layouts.app', ['activePage' => 'slider', 'titlePage' => __('Manage sliders')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Add slider</h4>
            <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
          </div>
          <div class="card-body">
            <div class="my-form">
  
            <form method="POST" action="{{url('/')}}/slider" autocomplete="off" enctype="multipart/form-data">
            @csrf
         <div class="form-group">
          <label for="image">image</label>
           <input type="file" name="image" id="image" placeholder="image" class="form-control" required="required" autocomplete="off"/>
         </div>
          
              <input type="hidden" value="value" name="title" id="title" placeholder="Title" class="form-control" required="required"  autocomplete="off"/>
           
              <input type="hidden" value="value" name="title_ar" id="title_ar" placeholder="Arabic title" class="form-control" required="required"  autocomplete="off"/>
           
              <input type="hidden" value="value" name="text" id="text" placeholder="Text" class="form-control" required="required"  autocomplete="off"/>
           
              <input type="hidden" value="value" name="text_ar" id="text_ar" placeholder="Arabic Text" class="form-control" required="required"  autocomplete="off"/>
           
              <input type="hidden" value="value" name="button_text" id="button_text" placeholder="button text" class="form-control" required="required"  autocomplete="off"/>
          
              <input type="hidden" value="value" name="button_text_ar" id="button_text_ar" placeholder="Arabic button text" class="form-control" required="required"  autocomplete="off"/>
             <input type="hidden" value="1" name="ordering" id="ordering" placeholder="ordering" class="form-control" required="required"  autocomplete="off"/>
           </div>


            <div class="row">
                        <div class="col-12 text-center">
                          <button type="submit" class="btn btn-sm btn-primary"> <i class="material-icons">add</i> Add new slider</button>
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