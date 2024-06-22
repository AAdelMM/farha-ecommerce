@extends('layouts.app', ['activePage' => 'nav', 'titlePage' => __('navigation bar')])

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
            <div class="my-form">
  
            <form method="POST" action="{{url('/')}}/nav" autocomplete="off">
            @csrf
         <div class="form-group">
          <label for="name">name</label>
           <input type="text" name="name" id="name" placeholder="name" class="form-control" required="required" autocomplete="off"/>
         </div>
          
         <div class="form-group">
          <label for="name_ar">Arabic name</label>
            <input type="text" name="name_ar" id="name_ar" placeholder="Arabic name" class="form-control" required="required"  autocomplete="off"/>
           
         </div>
         <div class="form-group">
          <label for="url">URL</label>
            <input type="text" name="url" id="url" placeholder="#" class="form-control" required="required"  autocomplete="off"/>
           
         </div>
          
            <div class="row">
                        <div class="col-12 text-center">
                          <button type="submit" class="btn btn-sm btn-primary"> <i class="material-icons">add</i> Add nav item</button>
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