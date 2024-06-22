<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InteriorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $interior = DB::table('interior')->where('shown', '=', '1')->get();
        return view('control.interior.index', ['interior' => $interior]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = DB::table('interior_category')->where('shown', '=', 1)->get();
        return view('control.interior.create', ['categories' => $categories]);
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
        $request->image->move(public_path('uploads/interior/'), $imageName);
        $insert_query = DB::table('interior')->insert([
            'image' => $imageName,
            'name' => $_REQUEST['name'],
            'name_ar' => $_REQUEST['name_ar'],
            'category_id'=>$_REQUEST['category_id'],
            'created_at' => Carbon::now()
        ]);
        if($insert_query){
            return redirect('/interior');
        }else{
            return redirect('/interior/create');
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
        return redirect('/interior');
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
        $update = DB::table('interior')
              ->where('id', $id)
              ->update(['shown' => 0, 'updated_at'=>Carbon::now()]);
        if($update){
            return 'Item deleted successfully.';
        }else{
           return 'Something went wrong, Please try again later.';
        }
        
        
    }
}
