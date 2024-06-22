@extends('layouts.app', ['activePage' => 'about', 'titlePage' => __('Manage about')])

@section('content')
<!-- Insert the blade containing the TinyMCE configuration and source script -->

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          

        </div>
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Edit about
 </h4>
            <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
          </div>
          <div class="card-body">
            <div class="my-form">

            <form method="POST" action="{{url('/')}}/about/{{$about[0]->id}}" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="put" />
            <input type="hidden" name="id" id="id" value="{{$about[0]->id}}"/>

            <input type="hidden" name="title" id="title" placeholder="Title" class="form-control" required="required"  autocomplete="off" value="{{$about[0]->title}}"/>
            <input type="hidden" name="title_ar" id="title_ar" placeholder="Arabic title" class="form-control" required="required"  autocomplete="off" value="{{$about[0]->title_ar}}"/>
            {{-- <input type="hidden" name="text_ar" id="text_ar" placeholder="Arabic title" class="form-control" required="required"  autocomplete="off" value="{{$about[0]->title_ar}}"/> --}}
        
            <div class="form-group">
              <label for="text">Text</label>
                <textarea name="text" id="text" placeholder="Text" class="form-control" required="required"  autocomplete="off">{{$about[0]->text}}</textarea>
             </div>

             <div class="form-group">
              <label for="text_ar">Arabic Text</label>
                <textarea name="text_ar" id="text_ar" placeholder="Text" class="form-control" required="required"  autocomplete="off">{{$about[0]->text_ar}}</textarea>
             </div>


            <div class="row">
                        <div class="col-12 text-center">
                          <button type="submit" class="btn btn-sm btn-primary"> <i class="material-icons">edit</i> Edit about</button>
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
