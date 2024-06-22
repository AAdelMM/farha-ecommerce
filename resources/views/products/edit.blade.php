@extends('layouts.app', ['activePage' => 'products', 'titlePage' => __('edit products')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">edit products</h4>
          </div>
          <div class="card-body">
            <div class="my-form">
  
            <form method="POST" action="{{url('/')}}/product/update" autocomplete="off" enctype="multipart/form-data">
            @csrf
                <input type="hidden" name="id" id="id" value="{{$product->id}}"/>
<input type="hidden" name="url" id="url" value="{{ url()->previous() }}"/>
            <div class="form-group">
                <label for="avatar">avatar <small>[LEAVE BLANK TO IGNORE]</small> </label>
                  <input type="file" style="opacity:1;position:unset;" name="avatar" id="avatar" placeholder="avatar" class="form-control" autocomplete="off"/>
               </div>

               <div class="form-group">
                <label for="sku">SKU</label>
                <input type="text" name="sku" id="sku" placeholder="SKU" class="form-control" required="required" value="{{$product->sku}}" autocomplete="off"/>
            </div>
      
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Name" class="form-control" required="required" value="{{$product->name}}" autocomplete="off"/>
                </div>
          

           <div class="form-group">
            <label for="description">description</label>
              <textarea  name="description" id="description" placeholder="description" class="form-control" required="required" autocomplete="off">{{$product->description}}</textarea>
           </div>
           <div class="form-group">
            <label for="name_ar">Arabic Name</label>
            <input type="text" name="name_ar" id="name_ar" placeholder="Arabic Name" class="form-control"  value="{{$product->name_ar}}" required="required"  autocomplete="off"/>
        </div>
  

   <div class="form-group">
    <label for="description_ar">Arabic Description</label>
      <textarea  name="description_ar" id="description_ar" placeholder="Arabic Description" class="form-control" required="required"  autocomplete="off">{{$product->description_ar}}</textarea>
   </div>
   
           <div class="form-group">
            <label for="price">price</label>
              <input type="number" name="price" id="price" placeholder="price" class="form-control" required="required" value="{{$product->price}}" autocomplete="off"/>
           </div>
           <div class="form-group">
            <label for="category">Product category</label>
            <select name="category" id="category" required class="form-control">
                  @foreach ($categories as $c)
                  <optgroup  label="{{$c->name}}">
                      @foreach($sub as $s)
                      @if ($s->category_id == $c->id)
                        <option value="{{$s->id}}" @if($s->id == $product->subcategory_id) selected @endif>
                          {{$s->subcategory_name}}</option>
                      @endif
                      @endforeach
                    </optgroup>
                  @endforeach    
          </select>   
            </div>
           
           <div class="row">
                        <div class="col-12 text-center">
                          <button type="submit" class="btn btn-sm btn-primary"> <i class="material-icons">edit</i> edit</button>
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