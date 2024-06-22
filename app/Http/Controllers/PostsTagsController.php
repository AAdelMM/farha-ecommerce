<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class PostsTagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $post_tag = DB::select('select * from post_tag WHERE shown = 1');
        return view('control.post-tags.index', ['post_tag' => $post_tag]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('control.post-tags.create');
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

        $insert_query = DB::table('post_tag')->insert([
            'tag' => $_REQUEST['tag'],
            'tag_ar' => $_REQUEST['tag_ar'],
            'created_at' => Carbon::now()
        ]);
        if($insert_query){
            return redirect('/postags');
        }else{
            return view('control.post-tags.create');
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
        return redirect('/postags');
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
        $post_tag = DB::table('post_tag')->find($id);
        return view('control.post-tags.edit', ['post_tag' => $post_tag]);
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
        $update = DB::table('post_tag')
              ->where('id', $id)
              ->update([
                'tag' => $_REQUEST['tag'],
               'tag_ar' => $_REQUEST['tag_ar'],
               'updated_at'=>Carbon::now()
            ]);
        if($update){
            return redirect('/postags');
        }else{
            $post_tag = DB::table('post_tag')->find($id);
            return view('control.post-tags.edit', ['post_tag' => $post_tag]);
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
        $update = DB::table('post_tag')
              ->where('id', $id)
              ->update(['shown' => 0]);
        if($update){
            return 'Item deleted successfully.';
        }else{
           return 'Something went wrong, Please try again later.';
        }
    }
}
