<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InteriorCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = DB::table('interior_category')->where('shown', '=', 1)->get();
        return view('control.intcategories.index', ['categories' => $categories]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('control.intcategories.create');
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
        $insert_query = DB::table('interior_category')->insert([
            'name' => $_REQUEST['name'],
            'name_ar' => $_REQUEST['name_ar'],
            'created_at' => Carbon::now()
        ]);
        if($insert_query){
            return redirect('/interior-cat');
        }else{
            return redirect('/interior-cat/create');
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
        return redirect('/interior-cat');
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
         // update shown status from 1 to 0 (hidden item)
        $update = DB::table('interior_category')
              ->where('id', $id)
              ->update(['shown' => 0, 'updated_at' => Carbon::now()]);
        if($update){
            return 'Item deleted successfully.';
        }else{
           return 'Something went wrong, Please try again later.';
        }
        
    }
}
