<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class NavController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nav_items = DB::select('select * from nav WHERE shown = 1');
        return view('control.nav.index', ['nav_items' => $nav_items]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('control.nav.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //insert url statement
        
        $insert_query = DB::table('nav')->insert([
            'nav_item' => $_REQUEST['name'],
            'nav_item_ar' => $_REQUEST['name_ar'],
            'url' => $_REQUEST['url']
        ]);
        if($insert_query){
            return redirect('/nav');
        }else{
            return view('control.nav.create');
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
        return redirect('/nav');
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
        $nav_item = DB::table('nav')->find($id);
        return view('control.nav.edit', ['nav_item' => $nav_item]);
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
        $update = DB::table('nav')
              ->where('id', $id)
              ->update(['nav_item' => $_REQUEST['name'], 'nav_item_ar'=>$_REQUEST['name_ar'], 'url'=>$_REQUEST['url']]);
        if($update){
            return redirect('/nav');
        }else{
            $nav_item = DB::table('nav')->find($id);
        return view('control.nav.edit', ['nav_item' => $nav_item]);
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
        // update shown status from 1 to 0 (hidden item)
        $update = DB::table('nav')
              ->where('id', $id)
              ->update(['shown' => 0]);
        if($update){
            return 'Item deleted successfully.';
        }else{
           return 'Something went wrong, Please try again later.';
        }

    }
}
