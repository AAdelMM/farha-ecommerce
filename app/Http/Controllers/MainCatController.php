<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MainCatController extends Controller
{
    public function showCategories()
    {
        $cat = DB::table('main_cat')->paginate(10);
        return view('products.main-cat', ['cat' => $cat]);
    }

    public function addCategories()
    {
        return view('products.main-cat-add');
    }

    public function insertCategories(Request $request)
    {
        // 

        $insert = DB::table('main_cat')->insert([
            'name' => $request->name,
            'name_ar' => $request->name_ar,
            'created_at' => Carbon::now()
        ]);
        if($insert){
            return redirect('/product-main-cat');
        }
    }

    public function destroyCategories(Request $request, $id)
    {
        $delete = DB::table('main_cat')->where('id', '=', $id)->delete();
        if($delete){
            return Back();
        }
    }

    public function editCategories($id)
    {
        $getCat = DB::table('main_cat')->find($id);
        return view('products.main-cat-edit', ['cat' => $getCat]);
    }

    public function updateCategories(Request $request)
    {

        $update = DB::table('categories')->where('id', '=', $request->id)->update([
            'name' => $request->name,
            'name_ar' => $request->name_ar,
            'updated_at' => Carbon::now(),
        ]);
        
        if($update){
            return redirect('/product-main-cat');
        }else{
            return Back();
        }

    }
}
