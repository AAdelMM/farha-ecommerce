<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $social = DB::select('select * from social');
        $social_icon = DB::select('select * from social_icons');
        return view('control.social.index', ['social' => $social, 'social_icon'=>$social_icon]);
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
        return redirect('/social');
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
        
        $update = DB::table('social')
        ->where('id', $id)
        ->update([
            'facebook' => $_REQUEST['facebook'],
            'twitter' => $_REQUEST['twitter'],
            'instagram' => $_REQUEST['instagram'],
            'snapchat' => $_REQUEST['snapchat'],
            'linkedin' => $_REQUEST['linkedin'],
            'youtube' => $_REQUEST['youtube'],
            'tiktok' => $_REQUEST['tiktok'],
            'telegram' => $_REQUEST['telegram'],
            'whatsapp' => $_REQUEST['whatsapp'],
            'messenger' => $_REQUEST['messenger'],
            'updated_at' => Carbon::now()
        ]);
  if($update){
    
    return redirect('/social');
        
  }else{
    
    return redirect('/social');
        
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
