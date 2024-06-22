@extends('layouts.app', ['activePage' => 'favicon', 'titlePage' => __('favicon')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Favicon</h4>
          </div>
          <div class="card-body">
            <div class="my-form">
                <img src="{{url('/')}}/uploads/favicon/{{$favicon[0]->image}}" alt="edit image"/>
            <form method="POST" action="/favicon/{{$favicon[0]->id}}" data-parsley-validate autocomplete="off" enctype="multipart/form-data">
            
            {{ csrf_field() }}
{{ method_field('PATCH') }}
            <input type="hidden" name="id" id="id" value="{{$favicon[0]->id}}"/>
                

         <div class="form-group">
            <label for="image">upload new Favicon</label>
             <input type="file" class="form-control" name="image" id="image" placeholder="image" title='Upload new logo' required/>
           </div>

           <div class="row">
            <div class="col-12 text-center">
              <button type="submit" class="btn btn-sm btn-primary"> <i class="material-icons">edit</i> Edit Favicon</button>
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