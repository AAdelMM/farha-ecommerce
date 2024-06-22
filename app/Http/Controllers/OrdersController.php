<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;

class OrdersController extends Controller
{
    //

    public function index(Request $request)
    {
        if(isset($_GET['status'])){
            $orders = DB::table('orders')->where('status', '=', $_GET['status'])->orderBy('id', 'DESC')->paginate(10);
        }else{
        $orders = DB::table('orders')->orderBy('status', 'ASC')->orderBy('id', 'DESC')->paginate(10);
        }
        return view('control.orders.index', ['orders' => $orders]);
    }

    public function check($id)
    {
        $order = DB::table('orders')->find($id);
        
        $products = DB::table('cart_item')->where('process_id', '=', $order->cart_id)
        ->join('products', 'cart_item.product_id', '=', 'products.id')
        ->select('cart_item.*', 'products.slug as slug', 'products.sku')->get();
        $upd = DB::table('orders')->where('id', '=', $id)->update([
            'status' => 1,
            'updated_at' => Carbon::now(),
        ]);

        \Mail::to($order->email)->send(new TestEmail($order, $products));

        return Back();
    }

    public function CancelOrder(Request $request, $id)
    {
        $order = DB::table('orders')->find($id);
        
        $products = DB::table('cart_item')->where('process_id', '=', $order->cart_id)
        ->join('products', 'cart_item.product_id', '=', 'products.id')
        ->select('cart_item.*', 'products.slug as slug', 'products.sku')->get();
        $upd = DB::table('orders')->where('id', '=', $id)->update([
            'status' => 2,
            'updated_at' => Carbon::now(),
        ]);

        if($upd){
            return 'Order Cancelled!';
        }
    }

    public function show($id)
    {
        $order = DB::table('orders')->find($id);
        $products = DB::table('cart_item')->where('process_id', '=', $order->cart_id)
        ->join('products', 'cart_item.product_id', '=', 'products.id')
        ->leftJoin('product_sticker', 'cart_item.sticker', '=', 'product_sticker.id')
        ->select('cart_item.*', 'products.slug as slug', 'products.sku', 'products.avatar', 
        'product_sticker.name_ar as sticker_name', 'product_sticker.product_sticker as sticker_image')->get();
        $pros = array();
        $images = array();
        foreach($products as $pp){
            $arr = explode(',', $pp->color_id);
            foreach($arr as $a){
                $head = strtok($a, ':');
                $color = substr($a, (strpos($a, ':') ?: -1) + 1);
                $pros[$pp->id][$head] = $color;
            }
            
        }
        foreach($pros as $key1 => $ii){
            foreach($ii as $key => $i){
                if($key != 0){
                    // echo 'Product:' . $key1 . 'key: ' . $key . ' Value: ' . $i . '<br/>';
                    $im = DB::table('product_color')->where('color_heading', $key)->where('id', $i)
                    ->get();
                    $images[$key1][$key] = $im[0]->color_image;
                }
            }
        }
        
        return view('control.orders.show', ['order' => $order, 'products' => $products, 
        'images' => $images
    ]);
    }

    public function ReturnOrder(Request $request)
    {
        $id = substr($request->order, 2);
        $order = DB::table('orders')->find($id);
        if(!is_null($order)){
            $products = DB::table('cart_item')->where('process_id', '=', $order->cart_id)
        ->join('products', 'cart_item.product_id', '=', 'products.id')->select('cart_item.*', 'products.slug as slug', 'products.sku')->get();
        if(count($products) > 0){
            return view('control.orders.show', ['order' => $order, 'products' => $products]);
        }
        else{
            return Back();
        }
        }else{
            return Back();
        }
    }

}
