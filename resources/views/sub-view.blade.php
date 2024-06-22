@foreach ($sub as $s)
<label for="red">
    <input type="radio" name="sub_color_radio" id="subcolor{{$s->id}}" value="{{$s->id}}" checked>
    <span class="checkmark two" @isset($id)
    onclick="SendVal({{$s->id}}, '{{url('/')}}/uploads/{{$s->color_image}}')"
    @endisset style="background:{{$s->color_code}}"></span>
    <img class="@isset($id) hiddenImg1 @else hiddenImg2 @endisset" style="display:none" src="{{url('/')}}/uploads/{{$s->color_image}}"/>
</label>    
@endforeach