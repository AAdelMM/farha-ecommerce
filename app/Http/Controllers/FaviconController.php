<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FaviconController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $favicon = DB::table('favicon')->get();
        return view('control.favicon.index', ['favicon' => $favicon]);
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
        $favicon = DB::table('favicon')->get();
        return view('control.favicon.index', ['favicon' => $favicon]);
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
    public function update(Request $request, $id)
    {
        //
        // $request->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg,ico,vnd.microsoft.icon|max:2048',
        // ]);
    
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('uploads/favicon/'), $imageName);
        $update = DB::table('favicon')
        ->where('id', $id)
        ->update(['image' => $imageName, 'updated_at' => Carbon::now()]);
  if($update){
        $favicon = DB::table('favicon')->get();
        return view('control.favicon.index', ['favicon' => $favicon]);
        
  }else{
        $favicon = DB::table('favicon')->get();
        return view('control.favicon.index', ['favicon' => $favicon]);
        
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
