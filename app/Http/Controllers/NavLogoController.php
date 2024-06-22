<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class NavLogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $nav_logo = DB::table('nav_logo')->get();
        return view('control.navlogo.index', ['nav_logo' => $nav_logo]);
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
        return redirect('/navlogo');
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
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,PNG,JPG,JPEG|max:2048',
        ]);
    
        $imageName = time() . '.' . $request->image->extension();  
        $request->image->move(public_path('/uploads/navLogo/'), $imageName);
        $update = DB::table('nav_logo')->where('id', $id)->update(['image' => $imageName]);
  if($update){
        $nav_logo = DB::table('nav_logo')->get();
        return view('control.navlogo.index', ['nav_logo' => $nav_logo]);
        
  }else{
        $nav_logo = DB::table('nav_logo')->get();
        return view('control.navlogo.index', ['nav_logo' => $nav_logo]);
        
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
