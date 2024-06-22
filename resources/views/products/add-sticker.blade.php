@extends('layouts.app', ['activePage' => 'products', 'titlePage' => __('Add Product sticker')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">add product sticker</h4>
          </div>
          <div class="card-body">
            <div class="my-form">
  
            <form method="POST" action="{{url('/')}}/product/{{$id}}/sticker" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name_en">English sticker name</label>
                  <input type="text" style="" name="name_en" id="name_en" placeholder="English name" class="form-control" required="required"  autocomplete="off"/>
               </div>
               <div class="form-group">
               <label for="name_ar">Arabic sticker name</label>
                 <input type="text" style="" name="name_ar" id="name_ar" placeholder="color" class="form-control" required="required"  autocomplete="off"/>
              </div>
              <div class="form-group">
                <label for="product_sticker">product w sticker</label>
                  <input type="file" name="product_sticker" id="product_sticker" placeholder="product_sticker" 
                  class="form-control" required="required"  autocomplete="off"
                   style="opacity:1;position:unset"/>
               </div>
               <div class="form-group">
                <label for="sticker">sticker</label>
                  <input type="file" name="sticker" id="sticker" placeholder="sticker" 
                  class="form-control" required="required"  autocomplete="off"
                   style="opacity:1;position:unset"/>
               </div>

           
               <div class="form-group">
                <label for="color">Product color</label>
                    <select name="color" id="category" required class="form-control">
                        <option selected disabled>Please select product color</option>
                            @foreach ($color as $s)
                            <option value="{{$s->id}}">{{$s->color}} -- {{$s->color_ar}}</option>
                            @endforeach    
                    </select>  
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