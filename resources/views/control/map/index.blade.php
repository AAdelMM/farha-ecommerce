@extends('layouts.app', ['activePage' => 'map', 'titlePage' => __('map')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Map</h4>
          </div>
          <div class="card-body">
            <div class="my-form">
                <iframe src="{{$map[0]->link}}" width="100%" height="150px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <form method="POST" action="/map/{{$map[0]->id}}" data-parsley-validate autocomplete="off" enctype="multipart/form-data">
            {{ csrf_field() }}
{{ method_field('PATCH') }}
            <input type="hidden" name="_method" value="put" />
            <input type="hidden" name="id" id="id" value="{{$map[0]->id}}"/>
                

         <div class="form-group">
          <label for="link">URL</label>
           <input type="text" class="form-control" name="link" id="link" placeholder="URL" title='URL' required value="{{$map['0']->link}}"/>
         </div>

         <div class="form-group">
            <label for="address">address</label>
             <input type="text" class="form-control" name="address" id="address" placeholder="address" title='address' required value="{{$map['0']->address}}"/>
           </div>

           <div class="form-group">
              <label for="address_ar">Arabic address</label>
               <input type="text" class="form-control" name="address_ar" id="address_ar" placeholder="Arabic address" title='Arabic address' required value="{{$map['0']->address_ar}}"/>
             </div>

           <div class="row">
            <div class="col-12 text-center">
              <button type="submit" class="btn btn-sm btn-primary"> <i class="material-icons">edit</i> Edit map url</button>
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