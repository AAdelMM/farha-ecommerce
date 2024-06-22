@extends('layouts.app', ['activePage' => 'edit-main-cat', 'titlePage' => __('edit main categories')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">edit main categories</h4>
          </div>
          <div class="card-body">
            <div class="my-form">
  
            <form method="POST" action="{{url('/')}}/product-main-cat/update" autocomplete="off" enctype="multipart/form-data">
            @csrf
          <input type="hidden" name="id" value="{{$cat->id}}"/>
          <div class="form-group">
             <label for="name">Name</label>
               <input type="text" name="name" id="name" placeholder="Name" value="{{$cat->name}}" class="form-control" required="required"  autocomplete="off"/>
            </div>
           
         <div class="form-group">
          <label for="name_ar">Arabic name</label>
            <input type="text" name="name_ar" id="name_ar" placeholder="Arabic Name" value="{{$cat->name_ar}}" class="form-control" required="required"  autocomplete="off"/>
         </div>

           
           <div class="row">
                        <div class="col-12 text-center">
                          <button type="submit" class="btn btn-sm btn-primary"> <i class="material-icons">edit</i> edit category</button>
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