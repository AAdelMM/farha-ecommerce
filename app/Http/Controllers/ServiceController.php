<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $service = DB::select('select * from service WHERE shown = 1');
        return view('control.service.index', ['service' => $service]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('control.service.create');
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
        $request->image->move(public_path('uploads/service/'), $imageName);
        $insert_query = DB::table('service')->insert([
            'image' => $imageName,
            'title' => $_REQUEST['title'],
            'title_ar' => $_REQUEST['title_ar'],
            'text' => $_REQUEST['text'],
            'text_ar' => $_REQUEST['text_ar'],
            'ordering' => $_REQUEST['ordering'],
            'created_at' => Carbon::now()
        ]);
        if($insert_query){
            return redirect('/service');
        }else{
            return view('control.service.create');
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
        return redirect('/service');
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
        $service = DB::table('service')->find($id);
        return view('control.service.edit', ['service' => $service]);
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
         $update = DB::table('service')
         ->where('id', $id)
         ->update([
            'title' => $_REQUEST['title'],
            'title_ar' => $_REQUEST['title_ar'],
            'text' => $_REQUEST['text'],
            'text_ar' => $_REQUEST['text_ar'],
            'ordering' => $_REQUEST['ordering'],
            'updated_at' => Carbon::now()
         ]);
         if($update){
            return redirect('/service');
         }else{
            return redirect('/service');
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

        $update = DB::table('service')
              ->where('id', $id)
              ->update(['shown' => 0]);
        if($update){
            return 'Item deleted successfully.';
        }else{
           return 'Something went wrong, Please try again later.';
        }

    }
}
