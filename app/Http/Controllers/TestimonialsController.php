<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $testimonial = DB::select('select * from testimonial WHERE shown = 1');
        return view('control.testimonial.index', ['testimonial' => $testimonial]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('control.testimonial.create');
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
        $request->image->move(public_path('uploads/testimonial/'), $imageName);
        $insert_query = DB::table('testimonial')->insert([
            'image' => $imageName,
            'name' => $_REQUEST['name'],
            'name_ar' => $_REQUEST['name_ar'],
            'title' => $_REQUEST['title'],
            'title_ar' => $_REQUEST['title_ar'],
            'text' => $_REQUEST['text'],
            'text_ar' => $_REQUEST['text_ar'],
            'created_at' => Carbon::now()
        ]);
        if($insert_query){
            return redirect('/testimonial');
        }else{
            return view('control.testimonial.create');
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
        //
        
        return redirect('/testimonial');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $testimonial = DB::table('testimonial')->find($id);
        return view('control.testimonial.edit', ['testimonial' => $testimonial]);
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
        $update = DB::table('testimonial')
        ->where('id', $id)
        ->update([
            'name' => $_REQUEST['name'],
            'name_ar' => $_REQUEST['name_ar'],
            'title' => $_REQUEST['title'],
            'title_ar' => $_REQUEST['title_ar'],
            'text' => $_REQUEST['text'],
            'text_ar' => $_REQUEST['text_ar'],
            'updated_at' => Carbon::now()
        ]);
        if($update){
            
            return redirect('/testimonial');
        }else{
            $testimonial = DB::table('testimonial')->find($id);
        return view('control.testimonial.edit', ['testimonial' => $testimonial]);
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
        $update = DB::table('testimonial')
        ->where('id', $id)
        ->update(['shown' => 0]);
  if($update){
      return 'Item deleted successfully.';
  }else{
     return 'Something went wrong, Please try again later.';
  }
    }
}
