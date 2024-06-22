@extends('layouts.app', ['activePage' => 'products', 'titlePage' => __('products')])

@section('content')

    <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">products</h4>
            </div>
            <div class="card-body">
                              <div class="row">
                <div class="col-12 text-right">
                  <a href="{{url('/')}}/product/create" class="btn btn-sm btn-primary">Add product</a>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table border table-bordered text-center">
                  <thead class=" text-primary">
                    <tr>
                      <th>
                        SKU
                      </th>

                      <th>
                        Avatar
                    </th>
                    <th>
                      name
                    </th>
                    <th>
                      description
                    </th>
                    <th>
                      Arabic name
                    </th>
                    <th>
                      Arabic description
                    </th>
                    <th>
                      price
                    </th>
                    <th>
                      category
                    </th>
                    <th>
                      sub category
                    </th>
                    
                    <th class="">
                      Actions
                    </th>
                  </tr></thead>
                  <tbody>


                      @foreach ($products as $c)

                      <tr>
                        <td>{{$c->sku}}</td>
                        <td><img src="{{url('/')}}/uploads/{{$c->avatar}}" style="max-height:150px;"/></td>
                        <td>{{$c->name}}</td>
                       
                        <td>{{$c->description}}</td>
                        <td>{{$c->name_ar}}</td>
                       
                        <td>{{$c->description_ar}}</td>
                       
                        <td>{{$c->price}}</td>
                       
                        <td>{{$c->category_name}}</td>
                        <td>{{$c->subcategory_name}}</td>
                       
                         <td class="td-actions">
                            <a rel="tooltip" class="btn btn-info" href="{{url('/')}}/product/{{$c->id}}/show" data-original-title="Show product" title="Show product">
                                <i class="material-icons">bubble_chart</i>
                                <div class="ripple-container"></div>
                            </a>

                            <a rel="tooltip" class="btn btn-success" href="{{url('/')}}/product/{{$c->id}}" data-original-title="edit" title="edit">
                                <i class="material-icons">edit</i>
                                <div class="ripple-container"></div>
                              </a>
                          <form method="POST" action="{{url('/')}}/product/{{$c->id}}" style="display:inline-block;"  onSubmit="if(!confirm('Delete?')){return false;}">
                            @csrf
                            @method('delete')

                            <input type="hidden" name="id" id="id" value="{{$c->id}}" />
                            <button type="submit" rel="tooltip" class="btn btn-danger" data-original-title="delete" title="delete">
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
   
   {{ $products->withQueryString()->links() }}

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