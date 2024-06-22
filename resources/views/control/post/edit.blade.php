@extends('layouts.app', ['activePage' => 'post', 'titlePage' => __('Edit blog post')])

@section('content')
 <!-- Insert the blade containing the TinyMCE configuration and source script -->
 <script src="{{asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
 <script>
    tinymce.init({
      selector: 'textarea#desc_ar', // Replace this CSS selector to match the placeholder element for TinyMCE
      plugins: 'code table lists',
      toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
    });
   tinymce.init({
     selector: 'textarea#description', // Replace this CSS selector to match the placeholder element for TinyMCE
     plugins: 'code table lists',
     toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
   });
 </script> 

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Posts</h4>
              </div>
              <div class="card-body">
  <div class="my-form">
    
      <form method="POST" action="{{url('/')}}/post/{{$post->id}}" autocomplete="off" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="_method" value="put" />
            <input type="hidden" name="id" id="id" value="{{$post->id}}"/>
      <div class="form-group">
        <label for="title">Title</label>
         <input type="text" name="title" id="title" placeholder="Title" class="form-control" required="required"  autocomplete="off" value="{{$post->title}}"/>
      </div>

      <div class="form-group">
        <label for="title_ar">Arabic title</label>
         <input type="text" name="title_ar" id="title_ar" placeholder="Arabic title" class="form-control" required="required"  autocomplete="off" value="{{$post->title_ar}}"/>
      </div>

      <br/>

      <div class="form-group">
         <label for="description">Post</label>
         <textarea id="description" placeholder="Put your post text here!" name="description" >{{$post->description}}</textarea>
      </div>

      <div class="form-group">
         <label for="desc_ar">Arabic post</label>
         <textarea id="desc_ar" placeholder="Put your post text here!" name="desc_ar" >{{$post->desc_ar}}</textarea>
      </div>
    <br/>

    <div class="form-group">
        <label for="meta_description">Meta description</label>
         <input type="text" name="meta_description" id="meta_description" placeholder="Meta description" class="form-control" required="required"  autocomplete="off"value="{{$post->meta_description}}"/>
      </div>


      <div class="form-group">
        <label for="meta_description_ar">Arabic meta description</label>
         <input type="text" name="meta_description_ar" id="meta_description_ar" placeholder="Arabic meta description" class="form-control" required="required"  autocomplete="off"value="{{$post->meta_description_ar}}"/>
      </div>

      <div class="form-group">
        <label for="keywords">Keywords</label>
         <input type="text" name="keywords" id="keywords" placeholder="Keywords" class="form-control" required="required"  autocomplete="off"value="{{$post->keywords}}"/>
      </div>
      <div class="form-group">
        <label for="keywords_ar">Arabic keywords</label>
         <input type="text" name="keywords_ar" id="keywords_ar" placeholder="Arabic keywords" class="form-control" required="required"  autocomplete="off"value="{{$post->keywords_ar}}"/>
      </div>

<div class="form-group">
    <label for="post_tag_id">Post main tag</label>
    <select name="post_tag_id" id="post_tag_id" class="form-control" required>
        <option value=""  disabled>Please select main tag</option>
        @foreach($tags as $t)
        @if($t->id === $post->post_tag_id)
        <option value="{{$t->id}}" selected>{{$t->tag}}</option>
        @else
            <option value="{{$t->id}}">{{$t->tag}}</option>
        @endif
        @endforeach
    </select>
</div>
    
      <div class="row">
                  <div class="col-12 text-center">
                    <button type="submit" class="btn btn-sm btn-primary"> <i class="material-icons">edit</i> Edit Post</button>
                  </div>
                </div>
  </form>
  
  
  
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
