@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('users')])

@section('content')

    <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Users</h4>
              <p class="card-category"> Here you can manage users</p>
            </div>
            <div class="card-body">
                              <div class="row">
                <div class="col-12 text-right">
                  <a href="{{url('/')}}/user/create" class="btn btn-sm btn-primary">Add user</a>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <tr><th>
                        Name
                    </th>
                    <th>
                      Email
                    </th>
                    <th>
                      Role
                    </th>
                    <th>
                      Creation Date
                    </th>
                    
                    <th class="text-right">
                      Actions
                    </th>
                  </tr></thead>
                  <tbody>


                      @foreach ($users as $us)

                      <tr>
                        
                        <td>{{$us->name}}</td>
                        <td>{{$us->email}}</td>
                        <td>@if ($us->account_type == '3')
                          Admin
                          @else
                           user
                        @endif</td>
                        <td>{{$us->created_at}}</td>
                       
                         <td class="td-actions text-right">
                          <form method="POST" action="{{url('/')}}/user/{{$us->id}}" style="display:inline-block;"  onSubmit="if(!confirm('Delete?')){return false;}">
                            @csrf
                            @method('delete')

                            <input type="hidden" name="id" id="id" value="{{$us->id}}" />
                            <button type="submit" rel="tooltip" class="btn btn-danger" data-original-title="delete" title="delete">
                              <i class="material-icons">delete</i>
                              <div class="ripple-container"></div>
                            </button>
                          </form>
                            <a >
                              
                            </a>
                              {{-- <a rel="tooltip" class="btn btn-success" href="#" data-original-title="edit" title="edit">
                              <i class="material-icons">edit</i>
                              <div class="ripple-container"></div>
                            </a> --}}
                              
                                                      
                                                    </td>

                      </tr>

                      @endforeach


                  </tbody>
                </table>
 
 <div class="pagination">
   
   {{ $users->withQueryString()->links() }}

 </div>
              </div>
            </div>
          </div>
          <div class="alert alert-danger">
            <span style="font-size:18px;">
              <b> </b> Deleted users can't be retrieved!</span>
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