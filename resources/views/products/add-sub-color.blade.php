@extends('layouts.app', ['activePage' => 'products', 'titlePage' => __('Add Product Color')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">add product sub color</h4>
          </div>
          <div class="card-body">
            <div class="my-form">
  
            <form method="POST" action="{{url('/')}}/sub-color/{{$id}}" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="color">English color name</label>
                  <input type="text" style="" name="color" id="color" placeholder="color" class="form-control" required="required"  autocomplete="off"/>
               </div>
               <div class="form-group">
               <label for="color_ar">Arabic color name</label>
                 <input type="text" style="" name="color_ar" id="color_ar" placeholder="color" class="form-control" required="required"  autocomplete="off"/>
              </div>
              <div class="form-group">
                  <label for="color_code">Color Code</label>
                    <input type="color" style="" name="color_code" id="color_code" placeholder="Color Code" class="form-control" required="required"  autocomplete="off"/>
                 </div>
                 <div class="form-group">
                     <label for="color_image">Color image</label>
                       <input type="file" style="opacity:1;position:unset" name="color_image" id="color_image" placeholder="Color image" class="form-control" required="required"  autocomplete="off"/>
                    </div>
           
           <div class="row">
                        <div class="col-12 text-center">
                          <button type="submit" class="btn btn-sm btn-primary"> <i class="material-icons">add</i> Add</button>
                        </div>
                      </div>
        </form>
        
        
        
        </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection