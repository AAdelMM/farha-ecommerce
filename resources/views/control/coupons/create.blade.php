@extends('layouts.app', ['activePage' => 'coupon', 'titlePage' => __('coupon')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">coupon

            <a class="btn add-items" href="{{url('/')}}/coupons/create"><i class="fa fa-plus"></i></a>
            </h4>
            <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
          </div>
          <div class="card-body">
            <div class="my-form">
  
            <form method="POST" action="{{url('/')}}/coupons" autocomplete="off">
            @csrf
         
            <div class="form-group">
              <label for="coupon">coupon</label>
                <input type="text" name="coupon" id="coupon" placeholder="coupon" class="form-control" required="required"  autocomplete="off"/>
               
             </div>
             <div class="form-group">
              <label for="date">Valid Until</label>
                <input type="date" name="date" id="date" placeholder="date" class="form-control" required="required"  autocomplete="off"/>
               
             </div>
         
         <div class="form-group">
          <label for="percentage">percentage</label>
            <input type="number" name="percentage" id="percentage" placeholder="percentage" class="form-control" required="required"  autocomplete="off"/>
           
         </div>
          
            <div class="row">
                        <div class="col-12 text-center">
                          <button type="submit" class="btn btn-sm btn-primary"> <i class="material-icons">add</i> Add coupon</button>
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