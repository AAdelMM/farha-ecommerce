@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('Add new user')])

@section('content')

    <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Users</h4>
              <p class="card-category"> Here you can Add users</p>
            </div>
            <div class="card-body">
                              <div class="row">
                <div class="col-12 text-right">
                  <a href="#" class="btn btn-sm btn-primary">Add new user</a>
                </div>
              </div>
              
<div class="my-form">
  
    <form method="POST" action="{{route('user.store')}}" autocomplete="off">
    @csrf
 <div class="form-group">
  <label for="name">Username</label>
   <input type="text" name="name" id="name" placeholder="username" class="form-control" required="required" autocomplete="off"/>
 </div>
  
 <div class="form-group">
  <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="email" class="form-control" required="required"  autocomplete="off"/>
   
 </div>
 
 <div class="form-group">
  <label for="account_type">role</label>
  <select name="account_type" id="account_type" class="form-control" required>
    <option selected disabled >Please select role</option>
    <option value="3">admin</option>
    <option value="1">user</option>
  </select>
 </div>


 <div class="form-group">
   <label for="password">Password</label>
    <input type="password" name="password" id="password" placeholder="password" class="form-control" required="required"  autocomplete="off"/>
 </div>
  
 {{-- <div class="form-group">
   <label>Account type</label>
   <select name="acount_type_id" id="acount_type_id" class="form-control" required="required">
      <option disabled selected value="">Please Choose Account Type</option>
      <option value="1">Normal user</option>
      <option value="2">Admin</option>
      <option value="3">Super Admin</option>
    </select>
 </div> --}}
    <div class="row">
                <div class="col-12 text-center">
                  <button type="submit" class="btn btn-sm btn-primary"> <i class="material-icons">add</i> Add user</button>
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

@push('js')
  <script>
    // $(document).ready(function() {
    //   // Javascript method's body can be found in assets/js/demos.js
    //   md.initDashboardPageCharts();
    // });
  </script>
@endpush