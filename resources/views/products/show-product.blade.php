@extends('layouts.app', ['activePage' => 'products', 'titlePage' => __('products')])

@section('content')

    <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">products</h4>
            </div>
            <div class="card-body">
                              <div class="row">
                <div class="col-12 text-right mb-10 d-block pb-2">
                  <a href="{{url('/')}}/product/{{$product->id}}/sale" class="btn btn-sm btn-primary">Add sale</a>
                  <a href="{{url('/')}}/product/{{$product->id}}/picture" class="btn btn-sm btn-primary">Add pictures</a>
                  <a href="{{url('/')}}/product/{{$product->id}}/info" class="btn btn-sm btn-primary">Add info</a>
                  <a href="{{url('/')}}/product/{{$product->id}}/color-heading" class="btn btn-sm btn-primary">Add color heading</a>
                  {{-- <a href="{{url('/')}}/product/{{$product->id}}/color" class="btn btn-sm btn-primary">Add color</a> --}}
                  <a href="{{url('/')}}/product/{{$product->id}}/size" class="btn btn-sm btn-primary">Add size</a>
                  <a href="{{url('/')}}/product/{{$product->id}}/sticker" class="btn btn-sm btn-primary">Add sticker</a>
                </div>
              </div>
              <div class="table-responsive">
                <h3>Sale</h3>
                    @if (count($sale) != 0)
                    <div class="sale">
                        <div class="container">
                            <div class="row">
                                <h3 class="d-block w-100 text-center p-3">Sale
                                    <form method="POST" action="{{url('/')}}/product/{{$sale[0]->id}}/sale"  onSubmit="if(!confirm('Delete?')){return false;}" style="float:right">
                                        @csrf
                                        @method('delete')
            
                                        <input type="hidden" name="id" id="id" value="{{$sale[0]->id}}" />
                                        <button type="submit" rel="tooltip" class="btn btn-danger" data-original-title="delete" title="delete">
                                          <i class="material-icons">delete</i>
                                          <div class="ripple-container"></div>
                                        </button>
                                      </form>
                                </h3>
                                <div class="col-6 text-center p-1">{{$sale[0]->percentage}}%</div>
                                <div class="col-6 text-center p-1">{{$sale[0]->price_after}} EGP</div>
                                </div>
                        </div>
                    </div>
                    <hr/>
                    @endif
                    <h3>Additional Pictures</h3>
                    @if (count($images) > 0)
                     <div class="container">
                      <div class="row">
                        @foreach ($images as $p)
                          <div class="col-md-4">
                            <div class="image">
                              
                              <img src="{{url('/')}}/uploads/{{$p->picture}}" width="100%"/>
                              <form method="POST" action="{{url('/')}}/product/{{$p->id}}/picture" style="position:relative;top:-30px"  onSubmit="if(!confirm('Delete?')){return false;}">
                                @csrf
                                @method('delete')
    
                                <input type="hidden" name="id" id="id" value="{{$p->id}}" />
                                <button type="submit" rel="tooltip" class="btn btn-danger" data-original-title="delete" title="delete">
                                  <i class="material-icons">delete</i>
                                  <div class="ripple-container"></div>
                                </button>
                              </form>
                            </div>
                          </div>
                        @endforeach
                      </div>
                     </div>
                    @endif
                    @if (count($info) > 0)
                    <hr/>
                     <div class="container">
                      <div class="row">
                        @foreach ($info as $p)
                          <div class="col-md-4">
                            <div class="image p-2 mt-1" style="background:#eee">
                              <h5>{{$p->title}}</h5>
                              <p>{{$p->description}}</p>
                              <form method="POST"  onSubmit="if(!confirm('Delete?')){return false;}" action="{{url('/')}}/product/{{$p->id}}/info" style="">
                                @csrf
                                @method('delete')
    
                                <input type="hidden" name="id" id="id" value="{{$p->id}}" />
                                <button type="submit" rel="tooltip" class="btn btn-danger" data-original-title="delete" title="delete">
                                  <i class="material-icons">delete</i>
                                  <div class="ripple-container"></div>
                                </button>
                              </form>
                            </div>
                          </div>
                        @endforeach
                      </div>
                     </div>
                    @endif
                    <h3>Sizes</h3>
                    @if (count($size) > 0)
                    <hr/>
                    
                     <div class="container">
                      <div class="row">
                        @foreach ($size as $p)
                          <div class="col-md-2 text-center">
                            <div class="image p-2 mt-1" style="background:#eee">
                              <img src="{{url('/')}}/uploads/{{$p->image}}" style="height:100px;display:block;margin:0 auto 10px"/>
                              <h5>{{$p->size}}</h5>
                              <h5>{{$p->stock}} Pieces</h5>
                              <h5>{{$p->color_name}}-{{$p->color_name_ar}}</h5>
                              <form method="POST" onSubmit="if(!confirm('Delete?')){return false;}" action="{{url('/')}}/product/{{$p->id}}/size" style="">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" id="id" value="{{$p->id}}" />
                                <button type="submit" rel="tooltip" class="btn btn-danger" data-original-title="delete" title="delete">
                                  <i class="material-icons">delete</i>
                                  <div class="ripple-container"></div>
                                </button>
                              </form>
                            </div>
                          </div>
                        @endforeach
                      </div>
                     </div>
                    @endif<h3>Color-Main</h3>
                    @if (count($product_color_heading) > 0)
                    <hr/>
                     <div class="container">
                      <div class="row">
                        @foreach ($product_color_heading as $p)
                          <div class="col-md-12 text-center">
                            <div class="image p-2 mt-1" style="background:#eee">
                              <div class="row">
                                <div class="col-md-3"><img src="{{url('/')}}/uploads/{{$p->product_picture}}" style="height:100px;display:block;margin:0 auto 10px"/></div>
                                <div class="col-md-3"><h5>{{$p->name_en}} -- {{$p->name_ar}}</h5></div>
                                <div class="col-md-3"><h5>{{$p->title_en}} {{$p->title_ar}}</h5></div>
                                <div class="col-md-3">
                                  <a href="{{url('/')}}/product/{{$product->id}}/color/{{$p->id}}"
                                    class="btn btn-primary d-inline-block"><i class="fa fa-plus"></i></a>
                                  <a href="{{url('/')}}/product/{{$p->id}}/color-heading/edit"
                                    class="btn btn-success d-inline-block"><i class="fa fa-edit"></i></a>
                                  <form method="POST" onSubmit="if(!confirm('Delete?')){return false;}" 
                                  action="{{url('/')}}/product/{{$p->id}}/color-heading" class="d-inline-block">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" id="id" value="{{$p->id}}" />
                                    <button type="submit" rel="tooltip" class="btn btn-danger" data-original-title="delete" title="delete">
                                      <i class="material-icons">delete</i>
                                      <div class="ripple-container"></div>
                                    </button>
                                  </form>
                                </div>
                              </div>

                              <div class="row">
                                <?php $co = $color->get(); ?>
                                @foreach ($co as $c)
                                @if ($c->color_heading == $p->id)
                                <div class="col-md-3">
                                  <h5>{{$c->color}} -- {{$c->color_ar}}</h5>
                                  <h5 style="background-color:{{$c->color_code}};
                                  width:50px;height:50px;display:block;margin:5px auto 0 auto;"
                                  ></h5>
                                  <img src="{{url('/')}}/uploads/{{$c->color_image}}" 
                                       style="width:100px;margin:0 auto 5px auto;display:block"/>
                                  <form method="POST" onSubmit="if(!confirm('Delete?')){return false;}" 
                                        action="{{url('/')}}/product/{{$c->id}}/color" class="d-inline-block">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" id="id" value="{{$c->id}}" />
                                    <button type="submit" class="btn btn-danger">
                                      <i class="material-icons">delete</i>
                                      <div class="ripple-container"></div>
                                    </button>
                                  </form>
                                </div>
                                @endif
                                @endforeach
                              </div>
                             
                            </div>
                          </div>
                        @endforeach
                      </div>
                     </div>
                    @endif
{{-- <h3>Colors</h3>
                    @if (count($color) > 0)
                    <hr/>
                     <div class="container">
                      <div class="row">
                        @foreach ($color as $p)
                          <div class="col-md-6 text-center">
                            <div class="image p-2 mt-1" style="background:#eee">
                              <h5>{{$p->color}} - {{$p->color_ar}}</h5>
                              <h5 style="background-color:{{$p->color_code}};
                              width:50px;height:50px;display:block;margin:5px auto 0 auto;"
                              ></h5>
                              <img src="{{url('/')}}/uploads/{{$p->color_image}}" style="width:100px;margin:0 auto 5px auto;display:block"/>
                              <form method="POST" onSubmit="if(!confirm('Delete?')){return false;}" 
                                    action="{{url('/')}}/product/{{$p->id}}/color" class="d-inline-block">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" id="id" value="{{$p->id}}" />
                                <button type="submit" class="btn btn-danger">
                                  <i class="material-icons">delete</i>
                                  <div class="ripple-container"></div>
                                </button>
                              </form>

                              <a class="btn btn-primary d-inline-block" href="{{url('/')}}/sub-color/{{$p->id}}"><i class="fa fa-plus"></i></a>


                              <br/>
                              <?php // $ss = $subColor->where('color_id', $p->id)->get(); ?>
                              @foreach ($ss as $s)
                              <h5>{{$s->color}} - {{$s->color_ar}}</h5>
                              
                              <h5 style="background-color:{{$s->color_code}};
                              width:50px;height:50px;display:block;margin:5px auto 0 auto;"
                              ></h5>
                              <img src="{{url('/')}}/uploads/{{$s->color_image}}" style="width:100px;margin:0 auto 5px auto;display:block"/>
                              <form method="POST" onSubmit="if(!confirm('Delete?')){return false;}" 
                                    action="{{url('/')}}/sub-color/{{$s->id}}" class="d-inline-block">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" id="id" value="{{$s->id}}" />
                                <button type="submit" class="btn btn-danger">
                                  <i class="material-icons">delete</i>
                                  <div class="ripple-container"></div>
                                </button>
                              </form>

                              <a class="btn btn-primary d-inline-block" 
                              href="{{url('/')}}/sub-sub-color/{{$s->id}}">
                              <i class="fa fa-plus"></i></a>
                              <br/>
                              <?php // $ss = $subSubColor->where('sub_color_id', $s->id)->get(); ?>
                              @foreach ($ss as $s)
                              <h5>{{$s->color}} - {{$s->color_ar}}</h5>
                              <h5 style="background-color:{{$s->color_code}};
                              width:50px;height:50px;display:block;margin:5px auto 0 auto;"
                              ></h5>
                            
                              <img src="{{url('/')}}/uploads/{{$s->color_image}}" style="width:100px;margin:0 auto 5px auto;display:block"/>
                              <form method="POST" onSubmit="if(!confirm('Delete?')){return false;}" 
                                    action="{{url('/')}}/sub-sub-color/{{$s->id}}" class="d-inline-block">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" id="id" value="{{$s->id}}" />
                                <button type="submit" class="btn btn-danger">
                                  <i class="material-icons">delete</i>
                                  <div class="ripple-container"></div>
                                </button>
                              </form>

                              @endforeach
                              @endforeach

                             
                            </div>
                          </div>
                        @endforeach
                      </div>
                     </div>
                    @endif --}}
<h3>Stickers</h3>
                    @if (count($sticker) > 0)
                    <hr/>
                     <div class="container">
                      <div class="row">
                        @foreach ($sticker as $p)
                          <div class="col-md-6 text-center">
                            <div class="image p-2 mt-1" style="background:#eee">
                              <h5>{{$p->name_en}} - {{$p->name_ar}}</h5>
                              
                              <img src="{{url('/')}}/uploads/{{$p->product_sticker}}" style="width:100px;margin:0 auto 5px auto;display:block"/>
                              <form method="POST" onSubmit="if(!confirm('Delete?')){return false;}" 
                                    action="{{url('/')}}/product/{{$p->id}}/sticker" class="d-inline-block">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" id="id" value="{{$p->id}}" />
                                <button type="submit" class="btn btn-danger">
                                  <i class="material-icons">delete</i>
                                  <div class="ripple-container"></div>
                                </button>
                              </form>
                             
                            </div>
                          </div>
                        @endforeach
                      </div>
                     </div>
                    @endif


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