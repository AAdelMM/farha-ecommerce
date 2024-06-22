@extends('layouts.app', ['activePage' => 'products', 'titlePage' => __('Edit Color heading')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Edit color heading</h4>
          </div>
          <div class="card-body">
            <div class="my-form">
  
            <form method="POST" action="{{url('/')}}/product/{{$c->id}}/color-heading/edit" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name_en">English part name</label>
                  <input type="text" style="" name="name_en" id="name_en" value="{{$c->name_en}}"  placeholder="English part name" class="form-control" required="required"  autocomplete="off"/>
               </div>
               <div class="form-group">
               <label for="name_ar">Arabic part name</label>
                 <input type="text" style="" name="name_ar" id="name_ar" value="{{$c->name_ar}}" placeholder="Arabic part name" class="form-control" required="required"  autocomplete="off"/>
              </div>
              <div class="form-group">
                <label for="title_en">English title</label>
                  <input type="text" style="" name="title_en" id="title_en" value="{{$c->title_en}}" placeholder="English title" class="form-control" required="required"  autocomplete="off"/>
               </div>
               <div class="form-group">
               <label for="title_ar">Arabic title</label>
                 <input type="text" style="" name="title_ar" id="title_ar" value="{{$c->title_ar}}" placeholder="Arabic title" class="form-control" required="required"  autocomplete="off"/>
              </div>
              <div class="form-group">
                  <label for="color_code">Color Code</label>
                    <input type="color" style="" name="color_code" id="color_code" value="{{$c->color_code}}" placeholder="Color Code" class="form-control" required="required"  autocomplete="off"/>
                 </div>
           
           <div class="row">
                        <div class="col-12 text-center">
                          <button type="submit" class="btn btn-sm btn-success"> <i class="material-icons">edit</i> edit</button>
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