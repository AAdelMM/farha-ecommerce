@extends('layouts.app', ['activePage' => 'slider', 'titlePage' => __('Manage sliders')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Edit slider

            <a class="btn add-items" href="{{url('/')}}/slider/create"><i class="fa fa-plus"></i></a>
            </h4>
            <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
          </div>
          <div class="card-body">
            <div class="my-form">
  
            <form method="POST" action="/slider/{{$slider->id}}" data-parsley-validate autocomplete="off" enctype="multipart/form-data">
            {{ csrf_field() }}
{{ method_field('PATCH') }}
            <input type="hidden" name="id" id="id" value="{{$slider->id}}"/>
            
            <div class="form-group">
              <label for="title">Title</label>
                <input type="text" name="title" id="title" placeholder="Title" class="form-control" required="required"  autocomplete="off" value="{{$slider->title}}"/>
             </div>
             <div class="form-group">
              <label for="title_ar">Arabic title</label>
                <input type="text" name="title_ar" id="title_ar" placeholder="Arabic title" class="form-control" required="required"  autocomplete="off" value="{{$slider->title_ar}}"/>
             </div>
  
             <div class="form-group">
              <label for="text">Text</label>
                <input type="text" name="text" id="text" placeholder="Text" class="form-control" required="required"  autocomplete="off" value="{{$slider->text}}"/>
             </div>
             <div class="form-group">
              <label for="text_ar">Arabic text</label>
                <input type="text" name="text_ar" id="text_ar" placeholder="Arabic Text" class="form-control" required="required"  autocomplete="off" value="{{$slider->text_ar}}"/>
             </div>
             <div class="form-group">
              <label for="button_text">Button text</label>
                <input type="text" name="button_text" id="button_text" placeholder="Button Text" class="form-control" required="required"  autocomplete="off" value="{{$slider->button_text}}"/>
             </div>
             <div class="form-group">
              <label for="button_text_ar">Arabic button text</label>
                <input type="text" name="button_text_ar" id="button_text_ar" placeholder="Arabic button Text" class="form-control" required="required"  autocomplete="off" value="{{$slider->button_text_ar}}"/>
             </div>
  
             <div class="form-group">
              <label for="ordering">ordering</label>
                <input type="number" name="ordering" id="ordering" placeholder="ordering" class="form-control" required="required"  autocomplete="off" value="{{$slider->ordering}}"/>
             </div>
  
          
            <div class="row">
                        <div class="col-12 text-center">
                          <button type="submit" class="btn btn-sm btn-primary"> <i class="material-icons">edit</i> Edit slider</button>
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