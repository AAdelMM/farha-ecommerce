<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $post = DB::select('select * from post INNER JOIN post_tag ON post.post_tag_id = post_tag.id WHERE post.shown = 1');
        $post = DB::select('select * from post WHERE shown = 1');
        // $post = DB::table('post')->join('post_tag', function($join){
        //     $join->on('post_tag.id', '=', 'post.post_tag_id')->where('post.shown', '=', 1);
        // })->get();
        // $post = DB::select('select * from post, relife.post.id as post_id WHERE post.shown = 1 group by post_tag_id');
        // $tag = DB::table('post_tag')->joinSub($post, 'post', function($join){
        //     $join->on('post_tag.id', '=', 'post.post_tag_id');
        // })->get();
        $tag = DB::select('select * from post_tag WHERE shown = 1');
        
        return view('control.post.index', ['post' => $post, 'tag' => $tag]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tags = DB::select("select * from post_tag WHERE shown = 1");
        return view('control.post.create', ['tags' => $tags]);

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
        $request->image->move(public_path('uploads/posts/'), $imageName);
        $insert_query = DB::table('post')->insert([
            'title' => $_REQUEST['title'],
            'title_ar' => $_REQUEST['title_ar'],
            'description' => $_REQUEST['description'],
            'desc_ar' => $_REQUEST['desc_ar'],
            'image' => $imageName,
            'meta_description' => $_REQUEST['meta_description'],
            'meta_description_ar' => $_REQUEST['meta_description_ar'],
            'keywords' => $_REQUEST['keywords'],
            'keywords_ar' => $_REQUEST['keywords_ar'],
            'post_tag_id' => $_REQUEST['post_tag_id'],
            'created_at' => Carbon::now()
        ]);
        if($insert_query){
            return redirect('/post');
        }else{
            $tags = DB::select("select * from post_tag WHERE shown = 1");
            return view('control.post.create', ['tags' => $tags]);
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
        return redirect('/post');
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
        $post = DB::table('post')->find($id);
        $tags = DB::table('post_tag')->get();
        return view('control.post.edit', ['post' => $post , 'tags' => $tags]);
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
        $oldP = DB::table('post')->find($request->id);
        $fileInput = $request->all();
        if($file = $request->file('image')){
            $firstContact = $file->getClientOriginalName();
            $image = date('s-m') . str_replace(' ', '-', $firstContact);
            $file->move('uploads/posts/', $image);
        }else{
            $image = $oldP->image;
        }
        $update = DB::table('post')
        ->where('id', $id)
        ->update([
            'image' => $image,
            'title' => $_REQUEST['title'],
            'title_ar' => $_REQUEST['title_ar'],
            'description' => $_REQUEST['description'],
            'desc_ar' => $_REQUEST['desc_ar'],
            'meta_description' => $_REQUEST['meta_description'],
            'meta_description_ar' => $_REQUEST['meta_description_ar'],
            'keywords' => $_REQUEST['keywords'],
            'keywords_ar' => $_REQUEST['keywords_ar'],
            'post_tag_id' => $_REQUEST['post_tag_id'],
            'updated_at' => Carbon::now()
        ]);
        if($update){
            return redirect('/post');
        }else{
            $post = DB::table('post')->find($id);
        $tags = DB::table('post_tag')->get();
        return view('control.post.edit', ['post' => $post , 'tags' => $tags]);
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
        $update = DB::table('post')
        ->where('id', $id)
        ->update(['shown' => 0]);
  if($update){
      return 'Item deleted successfully.';
  }else{
     return 'Something went wrong, Please try again later.';
  }
    }
}
