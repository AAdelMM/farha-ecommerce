@extends('layouts.app', ['activePage' => 'subcat', 'titlePage' => __('subcategories')])

@section('content')

    <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">sub categories</h4>
            </div>
            <div class="card-body">
                              <div class="row">
                <div class="col-12 text-right">
                  <a href="{{url('/')}}/product-subcat/create" class="btn btn-sm btn-primary">Add sub category</a>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table border table-bordered text-center">
                  <thead class=" text-primary">
                    <tr>
                      
                    <th>
                      Name
                    </th>
                      
                    <th>
                      Arabic name
                    </th>
                    <th>
                      Category
                    </th>
                    
                    <th class="">
                      Actions
                    </th>
                  </tr></thead>
                  <tbody>


                      @foreach ($cat as $c)

                      <tr>
                        
                       <td>{{$c->subcategory_name}}</td>
                       <td>{{$c->subcategory_name_ar}}</td>
                       <td>{{$c->category_name}}</td>
                       
                         <td class="td-actions">
                        </a>
                        <a rel="tooltip" class="btn btn-info" href="{{url('/')}}/product-subcat/{{$c->id}}/show" data-original-title="show products" title="show products">
                        <i class="fa fa-eye"></i>
                        <div class="ripple-container"></div>
                      </a>
                          <form method="POST" action="{{url('/')}}/product-subcat/{{$c->id}}" style="display:inline-block;"  onSubmit="if(!confirm('Delete?')){return false;}">
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
                              <a rel="tooltip" class="btn btn-success" href="{{url('/')}}/product-subcat/{{$c->id}}" data-original-title="edit" title="edit">
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