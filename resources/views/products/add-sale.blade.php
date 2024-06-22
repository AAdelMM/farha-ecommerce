@extends('layouts.app', ['activePage' => 'products', 'titlePage' => __('add sale')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">add sale</h4>
          </div>
          <div class="card-body">
            <div class="my-form">
  
            <form method="POST" action="{{url('/')}}/product/{{$product_id}}/sale" autocomplete="off" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="percentage">Sale percentage</label>
                    <input type="number" name="percentage" id="percentage" placeholder="percentage" class="form-control" required="required"  autocomplete="off"/>
                </div>
          

           <div class="form-group">
            <label for="price_after">Price after</label>
              <textarea  name="price_after" id="price_after" placeholder="main product price - percentage" class="form-control" required="required"  autocomplete="off"></textarea>
           </div>
           
          <input type="hidden" name="product_id" id="product_id" value="{{$product_id}}"/>
           
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