<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $team = DB::select('select * from team_item WHERE shown = 1');
        return view('control.team.index', ['team' => $team]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('control.team.create');
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
        $request->image->move(public_path('uploads/team/'), $imageName);
        $insert_query = DB::table('team_item')->insert([
            'image' => $imageName,
            'name' => $_REQUEST['name'],
            'name_ar' => $_REQUEST['name_ar'],
            'title' => $_REQUEST['title'],
            'title_ar' => $_REQUEST['title_ar'],
            'created_at' => Carbon::now()
        ]);
        if($insert_query){
            
            return redirect('/team');
        }else{
            return view('control.team.create');
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
        return redirect('/team');
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
        $team = DB::table('team_item')->find($id);
        return view('control.team.edit', ['team' => $team]);
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
        $update = DB::table('team_item')
        ->where('id', $id)
        ->update([
            'name' => $_REQUEST['name'],
            'name_ar' => $_REQUEST['name_ar'],
            'title' => $_REQUEST['title'],
            'title_ar' => $_REQUEST['title_ar'],
            'updated_at' => Carbon::now()
        ]);
        if($update){
            return redirect('/team');
        }else{
            $team = DB::table('team_item')->find($id);
            return view('control.team.edit', ['team' => $team]);
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
        $update = DB::table('team_item')
        ->where('id', $id)
        ->update(['shown' => 0]);
  if($update){
      return 'Item deleted successfully.';
  }else{
     return 'Something went wrong, Please try again later.';
  }

    }
}
