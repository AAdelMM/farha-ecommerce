@extends('layouts.app', ['activePage' => 'home-meta', 'titlePage' => __('Home Meta')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Home page meta tags

            </h4>
            <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
          </div>
          <div class="card-body">
            <div class="my-form">
  
            <form method="POST" action="/home-meta/{{$home_meta[0]->id}}" data-parsley-validate autocomplete="off">
           {{ csrf_field() }}
{{ method_field('PATCH') }}
            <input type="hidden" name="id" id="id" value="{{$home_meta[0]->id}}"/>
         <div class="form-group">
          <label for="meta_description">meta description</label>
           <textarea name="meta_description" id="meta_description" placeholder="meta description" class="form-control" required="required" autocomplete="off">{{$home_meta[0]->meta_description}}</textarea>
         </div>
          
         <div class="form-group">
          <label for="meta_description_ar">Arabic meta description</label>
           <textarea name="meta_description_ar" id="meta_description_ar" placeholder="Arabic meta description" class="form-control" required="required" autocomplete="off">{{$home_meta[0]->meta_description_ar}}</textarea>
         </div>
          
          
         <div class="form-group">
            <label for="keywords">keywords</label>
             <textarea name="keywords" id="keywords" placeholder="keywords" class="form-control" required="required" autocomplete="off">{{$home_meta[0]->keywords}}</textarea>
           </div>
          
          
         <div class="form-group">
            <label for="keywords_ar">Arabic keywords</label>
             <textarea name="keywords_ar" id="keywords_ar" placeholder="Arabic keywords" class="form-control" required="required" autocomplete="off">{{$home_meta[0]->keywords_ar}}</textarea>
           </div>
              
            <div class="row">
                        <div class="col-12 text-center">
                          <button type="submit" class="btn btn-sm btn-primary"> <i class="material-icons">edit</i> Edit page meta</button>
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