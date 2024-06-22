@extends('layouts.app', ['activePage' => 'products', 'titlePage' => __('add product image')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">add product image</h4>
          </div>
          <div class="card-body">
            <div class="my-form">
  
            <form method="POST" action="{{url('/')}}/product/{{$id}}/picture" autocomplete="off" enctype="multipart/form-data">
            @csrf


            <div class="form-group">
                <label for="image">image</label>
                  <input type="file" style="opacity:1;position:unset;" name="image" id="image" placeholder="image" class="form-control" required="required"  autocomplete="off"/>
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
      

      <!-- end col -->


    </div>
  </div>
</div>
@endsection