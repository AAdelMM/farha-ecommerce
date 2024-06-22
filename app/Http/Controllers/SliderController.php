<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $slider = DB::select('select * from slider WHERE shown = 1');
        return view('control.slider.index', ['slider' => $slider]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('control.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('uploads/sliders/'), $imageName);
        $insert_query = DB::table('slider')->insert([
            'image' => $imageName,
            'title' => $_REQUEST['title'],
            'title_ar' => $_REQUEST['title_ar'],
            'text' => $_REQUEST['text'],
            'text_ar' => $_REQUEST['text_ar'],
            'button_text' => $_REQUEST['button_text'],
            'button_text_ar' => $_REQUEST['button_text_ar'],
            'ordering' => $_REQUEST['ordering'],
            'created_at' => Carbon::now()
        ]);
        if($insert_query){
            return redirect('/slider');
        }else{
            return view('control.slider.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return redirect('/slider');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = DB::table('slider')->find($id);
        return view('control.slider.edit', ['slider' => $slider]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $update = DB::table('slider')
        ->where('id', $id)
        ->update([
            'title' => $_REQUEST['title'],
            'title_ar' => $_REQUEST['title_ar'],
            'text' => $_REQUEST['text'],
            'text_ar' => $_REQUEST['text_ar'],
            'button_text' => $_REQUEST['button_text'],
            'button_text_ar' => $_REQUEST['button_text_ar'],
            'ordering' => $_REQUEST['ordering'],
            'updated_at' => Carbon::now()
        ]);
        if($update){
            return redirect('/slider');
        }else{
            
            return redirect('/slider');
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $update = DB::table('slider')
              ->where('id', $id)
              ->update(['shown' => 0]);
        if($update){
            return 'Item deleted successfully.';
        }else{
           return 'Something went wrong, Please try again later.';
        }
    }
}
