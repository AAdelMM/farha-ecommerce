@extends('layouts.app', ['activePage' => 'products', 'titlePage' => __('add product info')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">add product info</h4>
          </div>
          <div class="card-body">
            <div class="my-form">
  
            <form method="POST" action="{{url('/')}}/product/{{$id}}/info" autocomplete="off" enctype="multipart/form-data">
            @csrf


            <div class="form-group">
              <label for="title">info title</label>
                <input type="text" style="" name="title" id="title" placeholder="title" class="form-control" required="required"  autocomplete="off"/>
             </div>


          <div class="form-group">
              <label for="text">info text</label>
                <textarea name="text" id="text" placeholder="text" class="form-control" required="required"></textarea>
             </div>

             <div class="form-group">
                 <label for="title_ar">arabic info title</label>
                   <input type="text" style="" name="title_ar" id="title_ar" placeholder="title" class="form-control" required="required"  autocomplete="off"/>
                </div>
 
 
             <div class="form-group">
                 <label for="text_ar">arabic info text</label>
                   <textarea name="text_ar" id="text_ar" placeholder="text" class="form-control" required="required"></textarea>
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