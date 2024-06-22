@extends('layouts.app', ['activePage' => 'main-cat', 'titlePage' => __('main categories')])

@section('content')

    <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">main categories</h4>
            </div>
            <div class="card-body">
                              <div class="row">
                <div class="col-12 text-right">
                  <a href="{{url('/')}}/product-main-cat/create" class="btn btn-sm btn-primary">Add main category</a>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table border table-bordered text-center">
                  <thead class=" text-primary">
                    <tr>
                    <th>
                     Arabic name
                    </th>
                    <th>
                      name
                    </th>
                    
                    <th class="">
                      Actions
                    </th>
                  </tr></thead>
                  <tbody>


                      @foreach ($cat as $c)
                      <tr>
                        <td>{{$c->name_ar}}</td>
                        <td>{{$c->name}}</td>
                       
                         <td class="td-actions">
                          <form method="POST" action="{{url('/')}}/product-main-cat/{{$c->id}}" style="display:inline-block;"  onSubmit="if(!confirm('Delete?')){return false;}">
                            @csrf
                            @method('delete')

                            <input type="hidden" name="id" id="id" value="{{$c->id}}" />
                            <button type="submit" rel="tooltip" class="btn btn-danger" data-original-title="delete" title="delete">
                              <i class="material-icons">delete</i>
                              <div class="ripple-container"></div>
                            </button>
                          </form>
                            <a >
                              
                            </a>
                              <a rel="tooltip" class="btn btn-success" href="{{url('/')}}/product-main-cat/{{$c->id}}" data-original-title="edit" title="edit">
                              <i class="material-icons">edit</i>
                              <div class="ripple-container"></div>
                            </a>
                              
                                                      
                       </td>

                      </tr>

                      @endforeach


                  </tbody>
                </table>
 
 <div class="pagination">
   
   {{ $cat->withQueryString()->links() }}

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