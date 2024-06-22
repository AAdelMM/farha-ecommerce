<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; use Auth; use App; use Redirect; use Cookie; use Session;
class ProductView extends Component
{
    public $product = [], $slug;
    public function mount($slug){
        // $this->slug = $slug;
        $this->product = DB::table('products')->where('slug', '=', $slug)->get();
    }
    public function render(){
        $product = $this->product;
        $sale = DB::table('sale')->where('product_id', '=', $product[0]->id)->get();
        $sizes = DB::table('product_size')->where('product_id', '=', $product[0]->id)->get();
        $colors = DB::table('product_color')->where('product_id', $product[0]->id)->get();
        $pictures = DB::table('product_pictures')->where('product_id', '=', $product[0]->id)->get();
        $more = DB::table('products')
                    ->leftJoin('sale', 'products.id', '=', 'sale.product_id')
                    ->leftJoin('product_size', 'products.id', '=', 'product_size.product_id')
                    ->select('products.*', 'sale.percentage', 'sale.price_after', 'product_size.size')
                    ->groupBy('products.id')->orderBy('id', 'DESC')->limit(8)->get();
        $product_info = DB::table('product_info')->where('product_id', '=', $product[0]->id)->get();
        if(Auth::check()){
            $fav = DB::table('fav')->where('user_id', '=', Auth::user()->id)->get();
        }else{
            $fav = [];
        }
        return view('product', 
        ['p' => $product, 'fav' => $fav, 'product_info' => $product_info,
         'sale' => $sale, 'sizes' => $sizes, 'colors' => $colors,
         'pictures' => $pictures, 'more' => $more]);
        // dd($this->slug);
    }
}
