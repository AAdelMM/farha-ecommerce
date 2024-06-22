<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $about = DB::table('about')->get();
        return view('control.about.index', ['about' => $about]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
//         $imageName = time().'.'.$request->image->extension();  
//         $request->image->move(public_path('uploads/about/'), $imageName);
//         $update = DB::table('about')
//         ->where('id', 1)
//         ->update(['image' => $imageName, 'updated_at' => Carbon::now()]);
//   if($update){
//         return redirect('/about');
        
//   }else{
//         return redirect('/about');    
//   }
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
        return redirect('/about');
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $update = DB::table('about')
        ->where('id', '=' ,1)
        ->update([
           'text' => $request->text,
           'text_ar' => $request->text_ar,
           'updated_at' => Carbon::now()
        ]);
        if($update){
           return Back();
        }else{
            return Back();
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
    }
}
