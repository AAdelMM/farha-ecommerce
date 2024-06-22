@extends('layouts.app', ['activePage' => 'shipping', 'titlePage' => __('shipping')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">edit rate

            <a class="btn add-items" href="{{url('/')}}/shipping/create"><i class="fa fa-plus"></i></a>
            </h4>
            <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
          </div>
          <div class="card-body">
            <div class="my-form">
  
            <form method="POST" action="{{url('/')}}/shipping/{{$shipping->id}}" autocomplete="off">
            @csrf
            {{ method_field('PATCH') }}
         
         <div class="form-group">
          <label for="gov">gov</label>
            <input type="text" name="gov" id="gov" value="{{$shipping->gov_name}}" placeholder="gov" class="form-control" required="required"  autocomplete="off"/>
           
         </div>
         
         <div class="form-group">
          <label for="rate">rate</label>
            <input type="number" name="rate" id="rate" value="{{$shipping->shipping_rate}}" placeholder="rate" class="form-control" required="required"  autocomplete="off"/>
           
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