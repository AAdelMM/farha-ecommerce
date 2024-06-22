@extends('layouts.app', ['activePage' => 'add-cat', 'titlePage' => __('add categories')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">add categories</h4>
          </div>
          <div class="card-body">
            <div class="my-form">
  
            <form method="POST" action="{{url('/')}}/product-cat/create" autocomplete="off" enctype="multipart/form-data">
            @csrf
          
         <div class="form-group">
            <label for="name">Name</label>
              <input type="text" name="name" id="name" placeholder="Name" class="form-control" required="required"  autocomplete="off"/>
           </div>
          
         <div class="form-group">
            <label for="name_ar">Arabic name</label>
              <input type="text" name="name_ar" id="name_ar" placeholder="Arabic Name" class="form-control" required="required"  autocomplete="off"/>
           </div>
           <div class="form-group">
            <label for="avatar">avatar</label>
              <input type="file" style="opacity:1;position:unset;" name="avatar" id="avatar" placeholder="avatar" class="form-control" required="required"  autocomplete="off"/>
           </div>
           {{-- <div class="form-group">
            <label for="main_cat_id">main category</label>
            <select style="opacity:1;position:unset;" name="main_cat_id" id="main_cat_id" class="form-control" required>
            @foreach($main as $m)
              <option value="{{$m->id}}">{{$m->name}}</option>
            @endforeach
            </select>
           </div> --}}
           

           
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