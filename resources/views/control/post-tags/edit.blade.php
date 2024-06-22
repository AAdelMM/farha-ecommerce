@extends('layouts.app', ['activePage' => 'postags', 'titlePage' => __('Posts tags')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Post tags
            </h4>
            <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
          </div>
          <div class="card-body">
            <div class="my-form">
  
            <form method="POST" action="{{url('/')}}/postags/{{$post_tag->id}}" autocomplete="off">
            @csrf
            <input type="hidden" name="_method" value="put" />
            <input type="hidden" name="id" id="id" value="{{$post_tag->id}}"/>

         <div class="form-group">
          <label for="tag">tag</label>
           <input type="text" name="tag" id="tag" placeholder="tag" class="form-control" required="required" autocomplete="off" value="{{$post_tag->tag}}"/>
         </div>

         <div class="form-group">
          <label for="tag_ar">arabic tag</label>
           <input type="text" name="tag_ar" id="tag_ar" placeholder="tag" class="form-control" required="required" autocomplete="off" value="{{$post_tag->tag_ar}}"/>
         </div>
                 
            <div class="row">
                        <div class="col-12 text-center">
                          <button type="submit" class="btn btn-sm btn-primary"> <i class="material-icons">edit</i> Edit tag</button>
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