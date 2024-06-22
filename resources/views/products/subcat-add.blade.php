@extends('layouts.app', ['activePage' => 'add-subcat', 'titlePage' => __('add subcategories')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">add sub categories</h4>
          </div>
          <div class="card-body">
            <div class="my-form">
  
            <form method="POST" action="{{url('/')}}/product-subcat/create" autocomplete="off" enctype="multipart/form-data">
            @csrf
          
         <div class="form-group">
            <label for="subcategory_name">Name</label>
              <input type="text" name="subcategory_name" id="subcategory_name" placeholder="Name" class="form-control" required="required"  autocomplete="off"/>
           </div>
           
         <div class="form-group">
          <label for="subcategory_name_ar">Arabic name</label>
            <input type="text" name="subcategory_name_ar" id="subcategory_name_ar" placeholder="Arabic Name" class="form-control" required="required"  autocomplete="off"/>
         </div>
           <div class="form-group">
            <label for="category_id">category</label>
            <select class="form-control" name="category_id" id="category_id" required>
              <option value="" selected disabled>Please select category</option>
              @foreach($cats as $c)
                <option value="{{$c->id}}">{{$c->name}}</option>
              @endforeach
            </select>
          </div>

           
           <div class="row">
                        <div class="col-12 text-center">
                          <button type="submit" class="btn btn-sm btn-primary"> <i class="material-icons">add</i> Add </button>
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