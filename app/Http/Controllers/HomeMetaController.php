<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Redirect;

class HomeMetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $home_meta = DB::select('select * from home_meta WHERE id = 1 LIMIT 1;');
        $home_meta = DB::table('home_meta')->get();
        return view('control.homemeta.index', ['home_meta' => $home_meta]);
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
        return redirect('home-meta');
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
        $update = DB::table('home_meta')
        ->where('id', $id)
        ->update(['meta_description' => $_REQUEST['meta_description'], 'meta_description_ar'=>$_REQUEST['meta_description_ar'], 'keywords'=>$_REQUEST['keywords'], 'keywords_ar' => $_REQUEST['keywords_ar']]);
  if($update){
    $home_meta = DB::table('home_meta')->get();
    return view('control.homemeta.index', ['home_meta' => $home_meta]);
  }else{
    $home_meta = DB::table('home_meta')->get();
    return view('control.homemeta.index', ['home_meta' => $home_meta]);
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
