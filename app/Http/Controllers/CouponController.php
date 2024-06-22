<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class CouponController extends Controller
{
    //
    public function index()
    {
        // $coupons = DB::table('coupon')->leftJoin('orders', 'orders.coupon', '=', 'coupon.coupon')
        // ->select('coupon.*', 'orders.coupon as cp', DB::raw("count(cp) as usage"))->groupBy('coupon.coupon')->get();
         $coupons = DB::select('SELECT coupon.*, COUNT(orders.coupon) AS c_usage FROM coupon
        LEFT JOIN orders ON orders.coupon = coupon.coupon GROUP BY coupon.coupon');
        // dd($coupons);
        return view('control.coupons.index', ['coupons' => $coupons]);
    }
    public function create()
    {
        return view('control.coupons.create');
    }

    public function insert(Request $request)
    {
        $insert = DB::table('coupon')->insert([
            'coupon'=>$request->coupon,
            'percentage' => $request->percentage,
            'valid_until' => $request->date,
            'created_at' => Carbon::now(),
        ]);
        if($insert) return redirect('/coupons');
    }


    public function edit($id)
    {
        $cou = DB::table('coupon')->find($id);
        return view('control.coupons.edit', ['cou' => $cou]);
    }

    public function update(Request $request, $id)
    {
        $insert = DB::table('coupon')->where('id', '=', $id)->update([
            'coupon'=>$request->coupon,
            'percentage' => $request->percentage,
            'valid_until' => $request->date,
            'updated_at' => Carbon::now(),
        ]);
        if($insert) {return redirect('/coupons');}
        else{return Back();}
    }

    public function deleteCou(Request $request)
    {
        $delete = DB::table('coupon')->where('id', '=', $request->id)->delete();
        if($delete){
            return Back();
        }
    }
}
