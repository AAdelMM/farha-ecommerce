<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $shipping = DB::table('shipping')->get();
        return view('control.shipping.index', ['shipping' => $shipping]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('control.shipping.create');
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
        $insert = DB::table('shipping')->insert([
            'gov_name' => $request->gov,
            'shipping_rate' => $request->rate,
            'created_at' => Carbon::now(),
        ]);
        if($insert) return redirect('/shipping');
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
        return Back();
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
        $shipping = DB::table('shipping')->find($id);
        return view('control.shipping.edit', ['shipping' => $shipping]);
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
        $insert = DB::table('shipping')->where('id', '=', $id)->update([
            'gov_name' => $request->gov,
            'shipping_rate' => $request->rate,
            'updated_at' => Carbon::now(),
        ]);
        if($insert) return redirect('/shipping');
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
        $delete = DB::table('shipping')->where('id', '=', $id)->delete();

        if($delete) {
            return 'Item deleted successfully.';
        }else{
           return 'Something went wrong, Please try again later.';
        }
    }
}
