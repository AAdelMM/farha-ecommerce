@extends('layouts.app', ['activePage' => 'phone', 'titlePage' => __('Phone')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Phone

            <a class="btn add-items" href="{{url('/')}}/phone/create"><i class="fa fa-plus"></i></a>
            </h4>
            <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
          </div>
          <div class="card-body">
            <div class="my-form">
  
            <form method="POST" action="{{url('/')}}/phone" autocomplete="off">
            @csrf
         
         <div class="form-group">
          <label for="phone">phone</label>
            <input type="number" name="phone" id="phone" placeholder="phone" class="form-control" required="required"  autocomplete="off"/>
           
         </div>
          
            <div class="row">
                        <div class="col-12 text-center">
                          <button type="submit" class="btn btn-sm btn-primary"> <i class="material-icons">add</i> Add phone number</button>
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