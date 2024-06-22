@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        

        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-default card-header-icon">
              <div class="card-icon">
                <i class="material-icons">phone</i>
              </div>
              <p class="card-category">phone numbers</p>
              <h3 class="card-title">
                <small>Manage phone</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-info">info</i>
                <a href="{{url('/')}}/phone">Go to page</a>
              </div>
            </div>
          </div>
        </div>


        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">language</i>
              </div>
              <p class="card-category">social Links</p>
              <h3 class="card-title">
                <small>Manage Links</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-info">info</i>
                <a href="{{url('/')}}/social">Go to page</a>
              </div>
            </div>
          </div>
        </div>


        
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">library_books</i>
              </div>
              <p class="card-category">Home meta</p>
              <h3 class="card-title">
                <small>SEO Management</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-info">info</i>
                <a href="{{ url('/') }}/home-meta">Go to page</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">image</i>
              </div>
              <p class="card-category">sliders</p>
              <h3 class="card-title">
                <small>Manage sliders</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-info">info</i>
                <a href="{{url('/')}}/slider">Go to page</a>
              </div>
            </div>
          </div>
        </div>


        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">?</i>
              </div>
              <p class="card-category">About</p>
              <h3 class="card-title">
                <small>Manage About Us</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-info">info</i>
                <a href="{{url('/')}}/about">Go to page</a>
              </div>
            </div>
          </div>
        </div>


        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">library_books</i>
              </div>
              <p class="card-category">Wall & Posts</p>
              <h3 class="card-title">
                <small>Manage wall</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-info">info</i>
                <a href="{{url('/')}}/post">Go to page</a>
              </div>
            </div>
          </div>
        </div>


        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">library_books</i>
              </div>
              <p class="card-category">Wall & Posts</p>
              <h3 class="card-title">
                <small>Manage wall</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-info">info</i>
                <a href="{{url('/')}}/post">Go to page</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">bubble_chart</i>
              </div>
              <p class="card-category">Products sub categories</p>
              <h3 class="card-title">
                <small>Manage sub categories</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-info">info</i>
                <a href="{{url('/')}}/product-subcat">Go to page</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">map</i>
              </div>
              <p class="card-category">Products categories</p>
              <h3 class="card-title">
                <small>Manage categories</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-info">info</i>
                <a href="{{url('/')}}/product-cat">Go to page</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">map</i>
              </div>
              <p class="card-category">Products</p>
              <h3 class="card-title">
                <small>Manage products</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-info">info</i>
                <a href="{{url('/')}}/product">Go to page</a>
              </div>
            </div>
          </div>
        </div>


        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">money</i>
              </div>
              <p class="card-category">shipping</p>
              <h3 class="card-title">
                <small>Manage shipping</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-info">info</i>
                <a href="{{url('/')}}/shipping">Go to page</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">menu</i>
              </div>
              <p class="card-category">orders</p>
              <h3 class="card-title">
                <small>Manage orders</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-info">info</i>
                <a href="{{url('/')}}/orders">Go to page</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">content_paste</i>
              </div>
              <p class="card-category">coupons</p>
              <h3 class="card-title">
                <small>Manage coupons</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-info">info</i>
                <a href="{{url('/')}}/coupons">Go to page</a>
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
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush