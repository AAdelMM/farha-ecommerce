@extends('layouts.app', ['activePage' => 'testimonial', 'titlePage' => __('Testimonials')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Testimonials 

            <a class="btn add-items" href="{{url('/')}}/testimonial/create"><i class="fa fa-plus"></i></a>
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
                    Name
                  </th>
                  <th>
                    Arabic name
                  </th>
                  <th>
                    Title
                  </th>
                  <th>
                    Arabic title
                  </th>
                  <th>
                    text
                  </th>
                  <th>
                    Arabic text
                  </th>
                  <th>
                    Control
                  </th>
                </thead>
                <tbody>
@foreach ($testimonial as $i)
<tr>
    <td>{{ $i->id }}</td>
    <td><img src="{{url('/')}}/uploads/testimonial/{{ $i->image }}" alt="{{ $i->title }}" height="100px"/></td>
    <td style="max-height:100px;overflow:hidden;">{{$i->name}}</td>
    <td style="max-height:100px;overflow:hidden;">{{$i->name_ar}}</td>
    <td style="max-height:100px;overflow:hidden;">{{$i->title}}</td>
    <td style="max-height:100px;overflow:hidden;">{{$i->title_ar}}</td>
    <td style="max-height:100px;overflow:hidden;">{{$i->text}}</td>
    <td style="max-height:100px;overflow:hidden;">{{$i->text_ar}}</td>
    <td class="text-primary">
    <a href='{{url('/')}}/testimonial/{{$i->id}}/edit' class="btn btn-success"><i class="fa fa-edit"></i> Edit</a> 

    <a href='{{url('/')}}/testimonial/{{$i->id}}' class="btn btn-danger deletebtn" itemid="{{$i->id}}" link="{{url('/')}}/testimonial"><i class="fa fa-trash"></i> Delete</a> 
    

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