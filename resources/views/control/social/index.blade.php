@extends('layouts.app', ['activePage' => 'social', 'titlePage' => __('social items')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Manage social links</h4>
          </div>
<div class="card-body">
<div class="my-form ">
<form method="POST" action="/social/{{$social[0]->id}}" data-parsley-validate autocomplete="off" enctype="multipart/form-data">
{{ csrf_field() }}
{{ method_field('PATCH') }}
<input type="hidden" name="id" id="id" value="{{$social[0]->id}}"/>

<div class="form-group">
    <label for="facebook"><img src="{{url('/') . $social_icon[0]->facebook}}" alt="" width="20px"/> facebook</label>
        <input type="text" class="form-control" name="facebook" id="facebook" placeholder="facebook" title='facebook' value="{{$social[0]->facebook}}"/>
    </div>

    <div class="form-group">
        <label for="twitter"><img src="{{url('/') . $social_icon[0]->twitter}}" alt="" width="20px"/> twitter</label>
        <input type="text" class="form-control" name="twitter" id="twitter" placeholder="twitter" title='twitter' value="{{$social[0]->twitter}}"/>
        </div>

        <div class="form-group">
            <label for="instagram"><img src="{{url('/') . $social_icon[0]->instagram}}" alt="" width="20px"/> instagram</label>
            <input type="text" class="form-control" name="instagram" id="instagram" placeholder="instagram" title='instagram' value="{{$social[0]->instagram}}"/>
            </div>

            <div class="form-group">
                <label for="snapchat"><img src="{{url('/') . $social_icon[0]->snapchat}}" alt="" width="20px"/> snapchat</label>
                <input type="text" class="form-control" name="snapchat" id="snapchat" placeholder="snapchat" title='snapchat' value="{{$social[0]->snapchat}}"/>
            </div>

            <div class="form-group">
                <label for="linkedin"><img src="{{url('/') . $social_icon[0]->linkedin}}" alt="" width="20px"/> linkedin</label>
                    <input type="text" class="form-control" name="linkedin" id="linkedin" placeholder="linkedin" title='linkedin' value="{{$social[0]->linkedin}}"/>
                </div>

                <div class="form-group">
                    <label for="youtube"><img src="{{url('/') . $social_icon[0]->youtube}}" alt="" width="20px"/> youtube</label>
                    <input type="text" class="form-control" name="youtube" id="youtube" placeholder="youtube" title='youtube' value="{{$social[0]->youtube}}"/>
                    </div>

                    <div class="form-group">
                        <label for="tiktok"><img src="{{url('/') . $social_icon[0]->tiktok}}" alt="" width="20px"/> tiktok</label>
                        <input type="text" class="form-control" name="tiktok" id="tiktok" placeholder="tiktok" title='tiktok' value="{{$social[0]->tiktok}}"/>
                        </div>

                        <div class="form-group">
                            <label for="telegram"><img src="{{url('/') . $social_icon[0]->telegram}}" alt="" width="20px"/> telegram</label>
                            <input type="text" class="form-control" name="telegram" id="telegram" placeholder="telegram" title='telegram' value="{{$social[0]->telegram}}"/>
                        </div>

                        <div class="form-group">
                            <label for="whatsapp"> <img src="{{url('/') . $social_icon[0]->whatsapp}}" alt="" width="20px"/> whatsapp</label>
                                <input type="text" class="form-control" name="whatsapp" id="whatsapp" placeholder="whatsapp" title='whatsapp' value="{{$social[0]->whatsapp}}"/>
                            </div>

                            <div class="form-group">
                                <label for="messenger"> <img src="{{url('/') . $social_icon[0]->messenger}}" alt="" width="20px"/> messenger</label>
                                <input type="text" class="form-control" name="messenger" id="messenger" placeholder="messenger" title='messenger' value="{{$social[0]->messenger}}"/>
                                </div>
    
<div class="row">
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-sm btn-primary"> <i class="material-icons">edit</i> Edit links</button>
            </div>
            </div>
</form>



</div>
</div>
            </div>
          </div>
        </div>
      

      <!-- end col -->


    </div>
  </div>
@endsection