<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Cookie;
use Illuminate\Http\Response;

class ShareCat
{
    public function handle(Request $request, Closure $next)
    {
      if (Cookie::get('user_cookie') == false){
        $minutes = 943200;
        $response = new Response('Set Cookie');
        $val = Carbon::now()->timestamp;
        Cookie::queue('user_cookie', $val, $minutes);
      }
      
        $cat = DB::table("categories")->get();
        $sub = DB::table('sub_category')->get();
        $social = DB::table('social')->find(1);
        $phone = DB::table('phone')->where('shown', '=', 1)->get();
        $about_us = DB::table('about')->find(1);
        if(Auth::check()){
          $cart = DB::table('cart')->where(function($query){
            $query->where('user_id', '=', Auth::user()->id)
            ->orWhere('cookie', '=', Cookie::get('user_cookie'));
            })->where('status', '=', 0)->get();
          $cart_items = DB::table('cart_item')->where(function($query){
            $query->where('user_id', '=', Auth::user()->id)
            ->orWhere('cookie', '=', Cookie::get('user_cookie'));
            })->where('status', '=', 0)->count();
            $cart_itemsss = DB::table('cart_item')->where(function($query){
              $query->where('cart_item.user_id', '=', Auth::user()->id)
              ->orWhere('cart_item.cookie', '=', Cookie::get('user_cookie'));
              })->where('cart_item.status', '=', 0)
              ->leftJoin('products', 'products.id', '=', 'cart_item.product_id')
              ->select('cart_item.*', 'products.avatar', 'products.slug')->get();
          $favCount = DB::table('fav')->where('user_id', '=', Auth::user()->id)->orWhere('cookie', '=', Cookie::get('user_cookie'))->count();
        }else{
          $cart = DB::table('cart')->where('cookie', '=', Cookie::get('user_cookie'))
          ->where('status', '=', 0)->get();
          $cart_items = DB::table('cart_item')->where('cookie', '=', Cookie::get('user_cookie'))
          ->where('status', '=', 0)->count();
          $cart_itemsss = DB::table('cart_item')->where('cart_item.cookie', '=', Cookie::get('user_cookie'))
          ->where('cart_item.status', '=', 0)
          ->leftJoin('products', 'products.id', '=', 'cart_item.product_id')
          ->select('cart_item.*', 'products.avatar', 'products.slug')->get();
          $favCount = DB::table('fav')->where('cookie', '=', Cookie::get('user_cookie'))->count();
        }

        $favicon = DB::table('favicon')->limit(1)->get();
      \View::share(['phone' => $phone, 'favicon'=>$favicon,
       'sub' => $sub,'categories'=> $cat, 'cart'=>$cart, 
       'cart_items' => $cart_items, 'favCount' => $favCount,
       'about_us' => $about_us, 
       'social' => $social, 'cart_itemsss' => $cart_itemsss]);
      return $next($request);
    }
}
