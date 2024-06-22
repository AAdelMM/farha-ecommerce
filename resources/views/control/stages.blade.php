@extends('layouts.app', ['activePage' => 'elev', 'titlePage' => __('elev')])

@section('content')

    <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Build your elevator</h4>
            </div>
            <div class="card-body">
                              <div class="row">
                <div class="col-12 text-right">
                </div>
              </div>
              <div class="table-responsive">
                <table class="table border table-bordered text-center">
                  <thead class=" text-primary">
                    <tr>
                      <th>
                        stage
                      </th>

                      <th>
                        floors
                    </th>

                      <th>
                        name
                    </th>
                    <th>
                      email
                    </th>
                    <th>
                      phone
                    </th>
                    <th>
                      messgae
                    </th>
                    <th>
                      door
                    </th>
                    <th>
                      rail
                    </th>
                    <th>
                      cabin
                    </th>
                    <th>
                      motor
                    </th>
                    <th>
                      controller
                    </th>
                    <th>
                      wire
                    </th>
                    <th>
                      status
                    </th>
                    
                    <th class="">
                      Actions
                    </th>
                  </tr></thead>
                  <tbody>


                      @foreach ($stages as $c)

                      <tr>
                        <td>{{$c->stage}}</td>
                        <td>{{$c->floors}}</td>
                        <td>{{$c->name}}</td>
                       
                        <td>{{$c->email}}</td>
                       
                        <td>{{$c->phone}}</td>
                       
                        <td>{{$c->message}}</td>
                       
                        <td>@if(!is_null($c->door)) <a class="btn btn-default" href="{{url('/')}}/stage/product/{{$c->door}}" target="_blank">visit</a> @endif</td>
                        <td>@if(!is_null($c->rail)) <a class="btn btn-default" href="{{url('/')}}/stage/product/{{$c->rail}}" target="_blank">visit</a> @endif</td>
                        <td>@if(!is_null($c->cabin)) <a class="btn btn-default" href="{{url('/')}}/stage/product/{{$c->cabin}}" target="_blank">visit</a> @endif</td>
                        <td>@if(!is_null($c->motor)) <a class="btn btn-default" href="{{url('/')}}/stage/product/{{$c->motor}}" target="_blank">visit</a> @endif</td>
                        <td>@if(!is_null($c->controller)) <a class="btn btn-default" href="{{url('/')}}/stage/product/{{$c->controller}}" target="_blank">visit</a> @endif</td>
                        <td>@if(!is_null($c->wire)) <a class="btn btn-default" href="{{url('/')}}/stage/product/{{$c->wire}}" target="_blank">visit</a> @endif</td>
                        <td>
                            @if($c->status == 0)
                            <i class="fa fa-spinner"></i>
                            @else
                            <i class="fa fa-check"></i>
                            @endif
                        </td>
                       
                         <td class="td-actions">
                            <a class="btn btn-info" href="{{url('/')}}/stage/{{$c->id}}/approve">
                                <i class="fa fa-check"></i>
                                <div class="ripple-container"></div>
                            </a>

                          <form method="POST" action="{{url('/')}}/stage/{{$c->id}}" style="display:inline-block;"  onSubmit="if(!confirm('Delete?')){return false;}">
                            @csrf
                            @method('delete')

                            <input type="hidden" name="id" id="id" value="{{$c->id}}" />
                            <button type="submit" class="btn btn-danger">
                              <i class="material-icons">delete</i>
                              <div class="ripple-container"></div>
                            </button>
                          </form>                            
                       </td>

                      </tr>

                      @endforeach


                  </tbody>
                </table>
 
 <div class="pagination">
   
   {{ $stages->withQueryString()->links() }}

 </div>
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