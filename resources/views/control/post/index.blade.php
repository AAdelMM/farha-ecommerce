@extends('layouts.app', ['activePage' => 'post', 'titlePage' => __('Posts')])

@section('content')
<style>
    td div{
        height:100px;
        overflow:hidden;
    }
    
</style>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Post 

            <a class="btn add-items" href="{{url('/')}}/post/create"><i class="fa fa-plus"></i></a>
            </h4>
            <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered text-center">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Image
                  </th>
                  <th>
                    Title
                  </th>
                  <th>
                    Arabic title
                  </th>
                  <th>
                    Post
                  </th>
                  <th>
                    Arabic Post
                  </th>
                  <th>
                    meta Description
                  </th>
                  <th>
                    Arabic meta description
                  </th>
                  <th>
                    Keywords
                  </th>
                  <th>
                    Arabic keywords
                  </th>
                  <th>
                    Post main tag
                  </th>
                  <th>
                    Control
                  </th>
                </thead>
                <tbody>
                  {{-- {{ dd($post) }} --}}
@foreach ($post as $i)
<tr>
    <td>{{ $i->id }}</td>
    <td><div><img src="{{url('/')}}/uploads/posts/{{ $i->image }}" alt="{{ $i->title }}" height="100px"/></div></td>
    <td style="max-height:100px;overflow:hidden;"><div>{{$i->title}}</div></td>
    <td style="max-height:100px;overflow:hidden;"><div>{{$i->title_ar}}</div></td>
    <td style="max-height:100px;overflow:hidden;"><div>{{$i->description}}</div></td>
    <td style="max-height:100px;overflow:hidden;"><div>{{$i->desc_ar}}</div></td>
    <td style="max-height:100px;overflow:hidden;"><div>{{$i->meta_description}}</div></td>
    <td style="max-height:100px;overflow:hidden;"><div>{{$i->meta_description_ar}}</div></td>
    <td style="max-height:100px;overflow:hidden;"><div>{{$i->keywords}}</div></td>
    <td style="max-height:100px;overflow:hidden;"><div>{{$i->keywords_ar}}</div></td>
    <td>
    @foreach($tag as $t)
    @if($i->post_tag_id === $t->id)
    {{$t->tag}}
    @endif
    @endforeach
    </td>
    
    <td class="text-primary">
    <a href='{{url('/')}}/post/{{$i->id}}/edit' class="btn btn-success"><i class="fa fa-edit"></i> Edit</a> 

    <a href='{{url('/')}}/post/{{$i->id}}' class="btn btn-danger deletebtn" itemid="{{$i->id}}" link="{{url('/')}}/post"><i class="fa fa-trash"></i> Delete</a> 
    

    </td>
  </tr>
@endforeach 
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      

      <!-- end col -->


    </div>
  </div>
</div>
@endsection