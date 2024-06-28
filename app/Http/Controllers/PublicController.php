<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
use App;
use Redirect;
use Cookie;
use Session;
use App\Mail\ConfirmEmail;
use App\Mail\FormSubmit;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
   
    
    public function index()
    {
        if(is_null(Session::get('locale'))){
            session()->put('locale', 'ar');
        }
        $products = DB::table('products')
        ->leftJoin('sale', 'products.id', '=', 'sale.product_id')
        ->leftJoin('product_size', 'products.id', '=', 'product_size.product_id')
        ->leftJoin('product_pictures', 'products.id', '=', 'product_pictures.product_id')
        ->select('products.*', 'sale.percentage', 'sale.price_after', 
        'product_size.size', 'product_pictures.picture AS plusPic')
        ->groupBy('products.id')->orderBy('id', 'DESC')->paginate(12);

        $categories = DB::select(DB::raw("SELECT categories.*, (SELECT COUNT(products.id) FROM products WHERE products.category_id = categories.id) products_count  FROM categories"));
        $about = DB::table('about')->get();
        $slider = DB::table('slider')->where('shown', '=', 1)->get();

        if(Auth::check()){
            $fav = DB::table('fav')->where('user_id', '=', Auth::user()->id)->get();
        }else{
            $fav = DB::table('fav')->where('cookie', '=',  Cookie::get('user_cookie'))->get();
        }
        return view('home', [
            'products' => $products, 
            'categories' => $categories,
         'about' =>$about, 'slider' => $slider, 'fav' => $fav]);
        
    }
    public function index2()
    {
        $products = DB::table('products')
        ->leftJoin('sale', 'products.id', '=', 'sale.product_id')
        ->leftJoin('product_size', 'products.id', '=', 'product_size.product_id')
        ->leftJoin('product_pictures', 'products.id', '=', 'product_pictures.product_id')
        ->select('products.*', 'sale.percentage', 'sale.price_after', 
        'product_size.size', 'product_pictures.picture AS plusPic')
        ->groupBy('products.id')->orderBy('id', 'DESC')->paginate(12);

        $categories = DB::select(DB::raw("SELECT categories.*, (SELECT COUNT(products.id) FROM products WHERE products.category_id = categories.id) products_count  FROM categories"));
        $about = DB::table('about')->get();
        $slider = DB::table('slider')->where('shown', '=', 1)->get();

        if(Auth::check()){
            $fav = DB::table('fav')->where('user_id', '=', Auth::user()->id)->get();
        }else{
            $fav = DB::table('fav')->where('cookie', '=',  Cookie::get('user_cookie'))->get();
        }
        return view('home2', [
            'products' => $products, 
            'categories' => $categories,
         'about' =>$about, 'slider' => $slider, 'fav' => $fav]);
        
    }
    public function login(Request $request)
    { $categories = DB::table('categories')->get();
       
        return view('sign-in', ['categories' => $categories]);
    }

    public function ShowCat($id)
    {

        if(isset($_GET['sort'])){
            if($_GET['sort'] == 'price'){
                if($_GET['value'] == 'tolow'){
                    $products = DB::table('products')->where('products.category_id', '=', $id)
                    ->leftJoin('sale', 'products.id', '=', 'sale.product_id')
                    ->leftJoin('product_size', 'products.id', '=', 'product_size.product_id')
                    ->select('products.*', 'sale.percentage', 'sale.price_after', 'product_size.size')
                    ->groupBy('products.id')->orderBy('price', 'DESC')->paginate(12);
                }else{
                    $products = DB::table('products')->where('products.category_id', '=', $id)
                    ->leftJoin('sale', 'products.id', '=', 'sale.product_id')
                    ->leftJoin('product_size', 'products.id', '=', 'product_size.product_id')
                    ->select('products.*', 'sale.percentage', 'sale.price_after', 'product_size.size')
                    ->groupBy('products.id')->orderBy('price', 'ASC')->paginate(12);
                }
                
            }elseif($_GET['sort'] == 'latest'){
                $products = DB::table('products')->where('products.category_id', '=', $id)
                ->leftJoin('sale', 'products.id', '=', 'sale.product_id')
                ->leftJoin('product_size', 'products.id', '=', 'product_size.product_id')
                ->select('products.*', 'sale.percentage', 'sale.price_after', 'product_size.size')
                ->groupBy('products.id')->orderBy('id', 'DESC')->paginate(12);
                
            }
        }else{
            $products = DB::table('products')->where('products.category_id', '=', $id)
            ->leftJoin('sale', 'products.id', '=', 'sale.product_id')
            ->leftJoin('product_size', 'products.id', '=', 'product_size.product_id')
            ->select('products.*', 'sale.percentage', 'sale.price_after', 'product_size.size')
            ->groupBy('products.id')->orderBy('id', 'DESC')->paginate(12);
            
        }
        $cat = DB::table('categories')->find($id);

        if(Auth::check()){
            $fav = DB::table('fav')->where('user_id', '=', Auth::user()->id)->get();
        }else{
            $fav = [];
        }
        return view('cat', ['products' => $products, 'cat' => $cat, 'fav' => $fav]);
        // dd($products);
    }

    public function ShowSubCat($id)
    {

        if(isset($_GET['sort'])){
            if($_GET['sort'] == 'price'){
                if($_GET['value'] == 'tolow'){
                    $products = DB::table('products')->where('products.subcategory_id', '=', $id)
                    ->leftJoin('sale', 'products.id', '=', 'sale.product_id')
                    ->leftJoin('product_size', 'products.id', '=', 'product_size.product_id')
                    ->select('products.*', 'sale.percentage', 'sale.price_after', 'product_size.size')
                    ->groupBy('products.id')->orderBy('price', 'DESC')->paginate(12);
                }else{
                    $products = DB::table('products')->where('products.category_id', '=', $id)
                    ->leftJoin('sale', 'products.id', '=', 'sale.product_id')
                    ->leftJoin('product_size', 'products.id', '=', 'product_size.product_id')
                    ->select('products.*', 'sale.percentage', 'sale.price_after', 'product_size.size')
                    ->groupBy('products.id')->orderBy('price', 'ASC')->paginate(12);
                }
                
            }elseif($_GET['sort'] == 'latest'){
                $products = DB::table('products')->where('products.subcategory_id', '=', $id)
                ->leftJoin('sale', 'products.id', '=', 'sale.product_id')
                ->leftJoin('product_size', 'products.id', '=', 'product_size.product_id')
                ->select('products.*', 'sale.percentage', 'sale.price_after', 'product_size.size')
                ->groupBy('products.id')->orderBy('id', 'DESC')->paginate(12);
                
            }
        }else{
            $products = DB::table('products')->where('products.subcategory_id', '=', $id)
            ->leftJoin('sale', 'products.id', '=', 'sale.product_id')
            ->leftJoin('product_size', 'products.id', '=', 'product_size.product_id')
            ->select('products.*', 'sale.percentage', 'sale.price_after', 'product_size.size')
            ->groupBy('products.id')->orderBy('id', 'DESC')->paginate(12);
            
        }
        $cat = DB::table('sub_category')->find($id);

        if(Auth::check()){
            $fav = DB::table('fav')->where('user_id', '=', Auth::user()->id)->get();
        }else{
            $fav = [];
        }
        return view('subcat', ['products' => $products, 'cat' => $cat, 'fav' => $fav]);
        // dd($products);
    }

public function getSize(Request $request){
    $color = $request->color;
    $getSize = DB::table('product_size')->where('color_id', '=', $color)->get();

    foreach($getSize as $g){
        echo  '<span class="singleSize">
        <label for="size'.$g->id.'" class="SizeSlider">
          '.$g->size.'
      </label>
        <input type="radio" name="size" id="size'.$g->id.'" value="'.$g->id.'"
        stock="'.$g->stock.'"/>
      </span>';
    }
}
    
public function LoadCart(Request $request)
{
    // اجلب تفاصيل المنتج
    $productId = $request->input('item_id');
    $quantity = $request->input('quantity');
    $price = $request->input('price');
    $colors = $request->input('colors'); // هذا حقل جديد للألوان
    $customImages = $request->input('custom_images'); // هذا حقل جديد للصور المخصصة

    // بناء البيانات التي سيتم إدخالها في قاعدة البيانات
    $cartItemData = [
        'product_id' => $productId,
        'count' => $quantity,
        'price' => $price,
        'colors' => json_encode($colors), // تخزين الألوان كـ JSON
        'custom_images' => json_encode($customImages), // تخزين الصور كـ JSON
        'created_at' => Carbon::now(),
    ];

    if (Auth::check()) {
        $userId = Auth::user()->id;
        $cartItemData['user_id'] = $userId;

        // تحقق مما إذا كان لدى المستخدم سلة غير مدفوعة
        $checkCart = DB::table('cart')->where('user_id', '=', $userId)->where('status', '=', 0)->first();
        
        if ($checkCart) {
            // أضف العنصر إلى السلة الحالية
            $cartItemData['cart_id'] = $checkCart->id;
        } else {
            // أنشئ سلة جديدة وأضف العنصر إليها
            $cartId = DB::table('cart')->insertGetId([
                'user_id' => $userId,
                'created_at' => Carbon::now(),
            ]);
            $cartItemData['cart_id'] = $cartId;
        }
    } else {
        // للمستخدمين الغير مسجلين (باستخدام الكوكيز)
        $cookie = Cookie::get('user_cookie');
        $cartItemData['cookie'] = $cookie;

        $checkCart = DB::table('cart')->where('cookie', '=', $cookie)->where('status', '=', 0)->first();

        if ($checkCart) {
            $cartItemData['cart_id'] = $checkCart->id;
        } else {
            $cartId = DB::table('cart')->insertGetId([
                'cookie' => $cookie,
                'created_at' => Carbon::now(),
            ]);
            $cartItemData['cart_id'] = $cartId;
        }
    }

    // أدخل العنصر في جدول cart_item
    try {
        DB::table('cart_item')->insert($cartItemData);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }

    return response()->json(['message' => 'Product added to cart with customizations']);
}


public function CartPage(Request $request)
{
    if(Auth::check()){
        $cart_items = DB::table('cart_item')->where(function($query){
            $query->where('user_id', '=', Auth::user()->id)
            ->orWhere('cookie', '=', Cookie::get('user_cookie'));
            })->where('status', '=', 0)
        ->leftjoin('products', 'cart_item.product_id', '=', 'products.id')
        ->leftJoin('product_sticker', 'cart_item.sticker', '=', 'product_sticker.id')
        ->select('cart_item.*', 'products.avatar', 'products.slug', 'products.images',
        'product_sticker.name_en as sticker_en', 'product_sticker.name_ar as sticker_ar')->get();

$total = DB::select("SELECT SUM(price*count) AS total FROM cart_item
 WHERE user_id = ?  AND status = 0 OR cookie = ? AND status = 0",
  [Auth::user()->id, Cookie::get('user_cookie')]);


        if(count($cart_items) > 0){
            $checkCoupon = DB::table('cart')->where('id', '=', $cart_items[0]->cart_id)->get();
            if(!is_null($checkCoupon[0]->coupon)){
                $getCoupon = DB::table('coupon')->where('coupon', '=', $checkCoupon[0]->coupon)->get();
                if(count($getCoupon) > 0){
                    if($getCoupon[0]->valid_until <= Carbon::now()){

                        $update = DB::table('cart')->where('id', '=', $cart_items[0]->cart_id)->update([
                            'coupon' => NULL,
                            'percentage' => NULL,
                            'updated_at' => Carbon::now(),
                        ]);
    
                        if($update){
                            return view('cart', ['cart_products' => $cart_items, 'total' => $total])
                                    ->withErrors(['msg' => 'Coupon Expired.']);
                        }
                    }
                }
            }
        }
    }else{
        $cart_items = DB::table('cart_item')->where('cookie', '=', Cookie::get('user_cookie'))
        ->where('status', '=', 0)
        ->leftjoin('products', 'cart_item.product_id', '=', 'products.id')
        ->leftJoin('product_sticker', 'cart_item.sticker', '=', 'product_sticker.id')
        ->select('cart_item.*', 'products.avatar', 'products.slug', 
        'product_sticker.name_en as sticker_en', 'product_sticker.name_ar as sticker_ar')->get();
        $total = DB::select("SELECT SUM(price*count) AS total FROM cart_item WHERE cookie = ? AND status = 0", 
        [Cookie::get('user_cookie')]);
        if(count($cart_items) > 0){
            $checkCoupon = DB::table('cart')->where('id', '=', $cart_items[0]->cart_id)->get();
            if(!is_null($checkCoupon[0]->coupon)){
                $getCoupon = DB::table('coupon')->where('coupon', '=', $checkCoupon[0]->coupon)->get();
                if(count($getCoupon) > 0){
                    if($getCoupon[0]->valid_until <= Carbon::now()){

                        $update = DB::table('cart')->where('id', '=', $cart_items[0]->cart_id)->update([
                            'coupon' => NULL,
                            'percentage' => NULL,
                            'updated_at' => Carbon::now(),
                        ]);
    
                        if($update){
                            return view('cart', ['cart_products' => $cart_items, 'total' => $total])
                                    ->withErrors(['msg' => 'Coupon Expired.']);
                        }
                    }
                }
            }
        }
    }
        

    return view('cart', ['cart_products' => $cart_items, 'total' => $total]);
}

public function UpdateCartCount(Request $request)
{
        $geti = DB::table('cart_item')->find($request->id);
        $getSize = DB::table('product_size')->where('product_id', '=', $geti->product_id)->where('size', '=', $geti->size)->get();
        if($getSize[0]->stock >= $request->count){
           if($request->count > 0){
            DB::table('cart_item')->where('id', '=', $request->id)->update([
                'count' => $request->count,
                'updated_at' => Carbon::now(),
            ]);
            return Back();
           }else{
            return back();
           }
        
        }elseif($getSize[0]->stock == 0){
            DB::table('cart_item')->where('id', '=', $request->id)->delete();
            $message = 'Your selected product ran out of stock.';
            return back()->withErrors(['count' => [$message]]);
        }elseif( $request->count >= $getSize[0]->stock){
            $message = 'Max available stock is: ' . $getSize[0]->stock;
            return back()->withErrors(['count' => [$message]]);
        }

}

public function AddToFav(Request $request)
{
    if(Auth::check()){
        $getFav = DB::table('fav')
        ->where(function($query){
            $query->where('user_id', '=', Auth::user()->id)
            ->orWhere('cookie', '=', Cookie::get('user_cookie'));
            })->where('product_id', '=', $request->id)->get();
        if(count($getFav) > 0){
            foreach($getFav as $gav){
                $delete = DB::table('fav')->where('id', '=', $gav->id)->delete();
            }
            return 'item removed from favs';
        }else{
            $insert = DB::table('fav')->insert([
                'user_id' => Auth::user()->id,
                'product_id' => $request->id,
                'created_at' => Carbon::now(),
            ]);
            return 'item added to favs';
        }
    }else{
        $getFav = DB::table('fav')->where('cookie', '=', Cookie::get('user_cookie'))->where('product_id', '=', $request->id)->get();
        if(count($getFav) > 0){
            $delete = DB::table('fav')->where('id', '=', $getFav[0]->id)->delete();
            return 'item removed from favs';
        }else{
            $insert = DB::table('fav')->insert([
                'cookie' => Cookie::get('user_cookie'),
                'product_id' => $request->id,
                'created_at' => Carbon::now(),
            ]);
            return 'item added to favs';
        }
    }
}

public function deleteCart(Request $request)
{
  $getCart = DB::table('cart_item')->where('status', '=', 0)->where('id', '=', $request->id)->get();
        if(count($getCart) > 0){
            DB::table('cart_item')->where('id', '=', $request->id)->delete();
        }
}

public function showProduct(Request $request, $slug)
{
    $product = DB::table('products')->where('products.slug', '=', $slug)->get();
    $sale = DB::table('sale')->where('product_id', '=', $product[0]->id)->get();
    $sizes = DB::table('product_size')->where('product_id', '=', $product[0]->id)->get();
    $colors = DB::table('product_color')->where('product_id', $product[0]->id)->get();
    $product_color_heading = DB::table('product_color_heading')->where('product_id', $product[0]->id)->get();
    $pictures = DB::table('product_pictures')->where('product_id', '=', $product[0]->id)->get();
    $more = DB::table('products')
                ->leftJoin('sale', 'products.id', '=', 'sale.product_id')
                ->leftJoin('product_size', 'products.id', '=', 'product_size.product_id')
                ->select('products.*', 'sale.percentage', 'sale.price_after', 'product_size.size')
                ->groupBy('products.id')->orderBy('id', 'DESC')->limit(8)->get();
    $product_info = DB::table('product_info')->where('product_id', '=', $product[0]->id)->get();
    $stickers = DB::table('product_sticker')->where('product_id', '=', $product[0]->id)->get();
    
    $cat = DB::table('categories')->find($product[0]->category_id);
    if(Auth::check()){
        $fav = DB::table('fav')->where('user_id', '=', Auth::user()->id)->get();
    }else{
        $fav = [];
    }
    return view('product', 
    ['p' => $product, 'fav' => $fav, 'product_info' => $product_info,
     'sale' => $sale, 'sizes' => $sizes, 'colors' => $colors,
     'pictures' => $pictures, 'more' => $more, 'cat' => $cat, 
     'product_color_heading' => $product_color_heading, 'stickers' => $stickers]);
}
public function GetSub(Request $request){
    $sub = DB::table('product_sub_color')->where('color_id', $request->tval)->get();
    return view('sub-view', ['sub' => $sub, 'id' => 1]);
}
public function GetSub2(Request $request){
    $sub = DB::table('product_sub_sub_color')->where('sub_color_id', $request->tval)->get();
    return view('sub-view', ['sub' => $sub]);
}

public function allProducts(Request $request)
{
    if(isset($_GET['sort'])){
        if($_GET['sort'] == 'price'){
            if($_GET['value'] == 'tolow'){
                $products = DB::table('products')
                ->leftJoin('sale', 'products.id', '=', 'sale.product_id')
                ->leftJoin('product_size', 'products.id', '=', 'product_size.product_id')
                ->select('products.*', 'sale.percentage', 'sale.price_after', 'product_size.size')
                ->groupBy('products.id')->orderBy('price', 'DESC')->paginate(12);
            }else{
                $products = DB::table('products')
                ->leftJoin('sale', 'products.id', '=', 'sale.product_id')
                ->leftJoin('product_size', 'products.id', '=', 'product_size.product_id')
                ->select('products.*', 'sale.percentage', 'sale.price_after', 'product_size.size')
                ->groupBy('products.id')->orderBy('price', 'ASC')->paginate(12);
            }
            
        }elseif($_GET['sort'] == 'latest'){
            $products = DB::table('products')
            ->leftJoin('sale', 'products.id', '=', 'sale.product_id')
            ->leftJoin('product_size', 'products.id', '=', 'product_size.product_id')
            ->select('products.*', 'sale.percentage', 'sale.price_after', 'product_size.size')
            ->groupBy('products.id')->orderBy('id', 'DESC')->paginate(12);
            
        }
    }else{
        $products = DB::table('products')
        ->leftJoin('sale', 'products.id', '=', 'sale.product_id')
        ->leftJoin('product_size', 'products.id', '=', 'product_size.product_id')
        ->select('products.*', 'sale.percentage', 'sale.price_after', 'product_size.size')
        ->groupBy('products.id')->orderBy('id', 'DESC')->paginate(12);
        
    }
    if(Auth::check()){
        $fav = DB::table('fav')->where('user_id', '=', Auth::user()->id)->get();
    }else{
        $fav = [];
    }
    return view('all-products', ['products' => $products, 'fav' => $fav]);
}

public function AllFav(Request $request)
{
    
    if(Auth::check()){
        $products = DB::table('fav')->where('user_id', '=', Auth::user()->id)->orWhere('cookie', '=', Cookie::get('user_cookie'))
    ->join('products', 'fav.product_id', '=', 'products.id')
    ->leftJoin('sale', 'fav.product_id', '=', 'sale.product_id')
    ->leftJoin('product_size', 'fav.product_id', '=', 'product_size.product_id')
    ->select('products.*', 'sale.percentage', 'sale.price_after', 'product_size.size')
    ->groupBy('fav.product_id')->orderBy('id', 'DESC')->paginate(12);
        $fav = DB::table('fav')->where('user_id', '=', Auth::user()->id)->orWhere('cookie', '=', Cookie::get('user_cookie'))->get();
    }else{
        $products = DB::table('fav')->where('cookie', '=', Cookie::get('user_cookie'))
    ->join('products', 'fav.product_id', '=', 'products.id')
    ->leftJoin('sale', 'fav.product_id', '=', 'sale.product_id')
    ->leftJoin('product_size', 'fav.product_id', '=', 'product_size.product_id')
    ->select('products.*', 'sale.percentage', 'sale.price_after', 'product_size.size')
    ->groupBy('fav.product_id')->orderBy('id', 'DESC')->paginate(12);
        $fav = DB::table('fav')->Where('cookie', '=', Cookie::get('user_cookie'))->get();
    }
    return view('all-fav', ['products' => $products, 'fav' => $fav]);
}

public function allCategories(Request $request)
{ 
    $main = DB::table('main_cat')->get();
    $categories = DB::select(DB::raw("SELECT categories.*,
     (SELECT COUNT(products.id) FROM products WHERE products.category_id = categories.id)
      products_count  FROM categories"));
    return view('all-cat', ['categories' => $categories, 'main' => $main]);    
    
}


public function contactUs(Request $request)
{
    $phone = DB::table('phone')->where('shown', '=', 1)->get();
    return view('contact-us', ['phone' => $phone]);
}

public function blog(Request $request)
{
    $posts = DB::table('post')->where('shown', '=', 1)->paginate(6);
    return view('blog', ['posts' => $posts]);
}

public function blogPost(Request $request, $id)
{
    $posts = DB::table('post')->where('shown', '=', 1)->limit(6)->get();
    $post = DB::table('post')->find($id);
    return view('post', ['post' => $post, 'posts' => $posts]);
}

public function search(Request $request)
{
    $qu = '%' . $request->search . '%';
    $products = DB::table('products')->where('name', 'LIKE', $qu)->orWhere('name_ar', 'LIKE', $qu)
    ->leftJoin('sale', 'products.id', '=', 'sale.product_id')
    ->leftJoin('product_size', 'products.id', '=', 'product_size.product_id')
    ->select('products.*', 'sale.percentage', 'sale.price_after', 'product_size.size')
    ->groupBy('products.id')->orderBy('id', 'DESC')->paginate(12);
    if(Auth::check()){
        $fav = DB::table('fav')->where('user_id', '=', Auth::user()->id)->get();
    }else{
        $fav = [];
    }
return view('search', ['products' => $products, 'fav' => $fav, 'query' => $request->search]);
}

public function checkout(Request $request)
{
    if(Auth::check()){
        $cart = DB::table('cart')->where(function($query){
            $query->where('user_id', '=', Auth::user()->id)
            ->orWhere('cookie', '=', Cookie::get('user_cookie'));
            })->where('status', '=', 0)->get();
    $cart_items = DB::table('cart_item')->where(function($query){
        $query->where('user_id', '=', Auth::user()->id)
        ->orWhere('cookie', '=', Cookie::get('user_cookie'));
        })->where('status', '=', 0)
        ->leftjoin('products', 'cart_item.product_id', '=', 'products.id')
        ->select('cart_item.*', 'products.avatar', 'products.slug')->get();


        $total = DB::select("SELECT SUM(price*count) AS total FROM cart_item
        WHERE user_id = ?  AND status = 0 OR cookie = ? AND status = 0",
         [Auth::user()->id, Cookie::get('user_cookie')]);

    $user_info = DB::table('user_info')->where('user_id', '=', Auth::user()->id)->get();
    $shipping_rate = DB::table('shipping')->get();
    if(count($cart_items) > 0){
        return view('checkout', ['cart' => $cart, 'products' => $cart_items, 
    'user' => $user_info, 'shipping' => $shipping_rate, 'total' => $total]);
    }else{
        return Back();
    }
    }else{
        $cart = DB::table('cart')->where('status', '=', 0)->where('cookie', '=', Cookie::get('user_cookie'))->get();
    $cart_items = DB::table('cart_item')->where('cookie', '=', Cookie::get('user_cookie'))->where('status', '=', 0)
        ->leftjoin('products', 'cart_item.product_id', '=', 'products.id')
        ->select('cart_item.*', 'products.avatar', 'products.slug')->get();
    $total = DB::select("SELECT SUM(price*count) AS total FROM cart_item WHERE cookie = ? AND status = 0", [Cookie::get('user_cookie')]);
    $user_info = DB::table('user_info')->where('cookie', '=', Cookie::get('user_cookie'))->get();
    $shipping_rate = DB::table('shipping')->get();
    if(count($cart_items) > 0){
        return view('checkout', ['cart' => $cart, 'products' => $cart_items, 
    'user' => $user_info, 'shipping' => $shipping_rate, 'total' => $total]);
    }else{
        return Back();
    }
    }
}

public function SaveUserInfo(Request $request)
{
   if(Auth::check()){
    $checkInf = DB::table('user_info')->where('user_id', '=', Auth::user()->id)->get();
    if(count($checkInf) > 0){
        $gov = DB::table('shipping')->where('id', '=', $request->gov)->get();
        $update = DB::table('user_info')->where('id', '=', $checkInf[0]->id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'notes' => $request->notes,
            'city' => $request->city,
            'postal' => $request->postal,
            'shipping_id' => $request->gov,
            'email' => $request->email,
            'shipping_rate' => $gov[0]->shipping_rate,
            'updated_at' => Carbon::now(),
        ]);

        return Back();
    }else{
        $gov = DB::table('shipping')->where('id', '=', $request->gov)->get();
        $update = DB::table('user_info')->insert([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'notes' => $request->notes,
            'city' => $request->city,
            'postal' => $request->postal,
            'email' => $request->email,
            'shipping_id' => $request->gov,
            'shipping_rate' => $gov[0]->shipping_rate,
            'created_at' => Carbon::now(),
        ]);
        return Back();
    }
   }else{
    $checkInf = DB::table('user_info')->where('cookie', '=', Cookie::get('user_cookie'))->get();
    if(count($checkInf) > 0){
        $gov = DB::table('shipping')->where('id', '=', $request->gov)->get();
        $update = DB::table('user_info')->where('id', '=', $checkInf[0]->id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'notes' => $request->notes,
            'city' => $request->city,
            'postal' => $request->postal,
            'shipping_id' => $request->gov,
            'email' => $request->email,
            'shipping_rate' => $gov[0]->shipping_rate,
            'updated_at' => Carbon::now(),
        ]);

        return Back();
    }else{
        $gov = DB::table('shipping')->where('id', '=', $request->gov)->get();
        $update = DB::table('user_info')->insert([
            'cookie' => Cookie::get('user_cookie'),
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'notes' => $request->notes,
            'city' => $request->city,
            'postal' => $request->postal,
            'email' => $request->email,
            'shipping_id' => $request->gov,
            'shipping_rate' => $gov[0]->shipping_rate,
            'created_at' => Carbon::now(),
        ]);
        return Back();
    }
   }
}

public function placeOrder(Request $request)
{
    $process_id = Carbon::now()->timestamp;
 
    if(Auth::check()){
        $getUserInfo = DB::table('user_info')->where('user_id', '=', Auth::user()->id)->get();
    
    $getCart = DB::table('cart')->where('user_id', '=', Auth::user()->id)->orderBy('id', 'DESC')->get();
    $shipping= DB::table('shipping')->where('id', '=', $getUserInfo[0]->shipping_id)->get();
    $total = DB::select("SELECT SUM(price*count) AS total FROM cart_item
    WHERE user_id = ?  AND status = 0 OR cookie = ? AND status = 0",
     [Auth::user()->id, Cookie::get('user_cookie')]);
    $placeOrder = DB::table('orders')->insert([
        'name' => $getUserInfo[0]->name,
        'coupon' => $getCart[0]->coupon,
        'percentage' => $getCart[0]->percentage,
        'user_id' => $getUserInfo[0]->user_id,
        'address' => $getUserInfo[0]->address,
        'city' => $getUserInfo[0]->city,
        'email' => $getUserInfo[0]->email,
        'postal' => $getUserInfo[0]->postal,
        'notes' => $getUserInfo[0]->notes,
        'phone' => $getUserInfo[0]->phone,
        'gov' => $shipping[0]->gov_name,
        'shipping_rate' => $shipping[0]->shipping_rate,
        'cart_id' => $process_id,
        'order_total' => $total[0]->total,
        'created_at' => Carbon::now(),
    ]);
    }else{
        $getUserInfo = DB::table('user_info')->where('cookie', '=', Cookie::get('user_cookie'))->get();
    
    $getCart = DB::table('cart')->where('cookie', '=', Cookie::get('user_cookie'))->orderBy('id', 'DESC')->get();
    $shipping= DB::table('shipping')->where('id', '=', $getUserInfo[0]->shipping_id)->get();
    $total = DB::select("SELECT SUM(price*count) AS total FROM cart_item WHERE cart_id = ?", [$getCart[0]->id]);
    $placeOrder = DB::table('orders')->insert([
        'name' => $getUserInfo[0]->name,
        'coupon' => $getCart[0]->coupon,
        'percentage' => $getCart[0]->percentage,
        'user_id' => $getUserInfo[0]->user_id,
        'address' => $getUserInfo[0]->address,
        'city' => $getUserInfo[0]->city,
        'email' => $getUserInfo[0]->email,
        'postal' => $getUserInfo[0]->postal,
        'notes' => $getUserInfo[0]->notes,
        'phone' => $getUserInfo[0]->phone,
        'gov' => $shipping[0]->gov_name,
        'shipping_rate' => $shipping[0]->shipping_rate,
        'cart_id' => $process_id,
        'order_total' => $total[0]->total,
        'created_at' => Carbon::now(),
    ]);
    }
    if($placeOrder){
        if(Auth::check()){
        $updateCart = DB::table('cart')
        ->where(function($query){
            $query->where('user_id', '=', Auth::user()->id)
            ->orWhere('cookie', '=', Cookie::get('user_cookie'));
            })->where('status', '=', 0)->update([
            'status' => 1,
            'process_id' => $process_id,
            'updated_at' => Carbon::now(),
        ]);
        $updateCart_items = DB::table('cart_item')->where(function($query){
            $query->where('user_id', '=', Auth::user()->id)
            ->orWhere('cookie', '=', Cookie::get('user_cookie'));
            })->where('status', '=', 0)->update([
            'status' => 1,
            'process_id' => $process_id,
            'updated_at' => Carbon::now(),
        ]);

        if($updateCart_items){

            $getCartItems = DB::table('cart_item')->where('process_id', '=', $process_id)->get();
            foreach($getCartItems as $i){
                $getSize = DB::table('product_size')
                ->where('product_id', '=', $i->product_id)
                ->where('id', '=', $i->size)->get();
                // $newC = $getSize[0]->stock - $i->count;
                // DB::table('product_size')->where('id', '=', $getSize[0]->id)->update([
                //     'stock' => $newC,
                //     'updated_at' => Carbon::now(),
                // ]);
            }

            $message = 'We received your order!';
            $order = DB::table('orders')->where('cart_id', '=',$process_id)->get();
            $products = DB::table('cart_item')->where('process_id', '=', $process_id)
            ->join('products', 'cart_item.product_id', '=', 'products.id')
            ->select('cart_item.*', 'products.slug as slug', 'products.sku')->get();
        // \Mail::to('orders@domain.com')->send(new ConfirmEmail($order, $products));
            return view('message', ['message' => $message]);
        }
        }else{
            
        $updateCart = DB::table('cart')->where('id', '=', $getCart[0]->id)->update([
            'status' => 1,
            'process_id' => $process_id,
            'updated_at' => Carbon::now(),
        ]);
        $updateCart_items = DB::table('cart_item')->where('cart_id', '=', $getCart[0]->id)->update([
            'status' => 1,
            'process_id' => $process_id,
            'updated_at' => Carbon::now(),
        ]);

        if($updateCart_items){

            $getCartItems = DB::table('cart_item')->where('cart_id', '=', $getCart[0]->id)->get();
            foreach($getCartItems as $i){
                $getSize = DB::table('product_size')
                ->where('product_id', '=', $i->product_id)
                ->where('id', '=', $i->size)->get();
                $newC = 100 - $i->count;
                // DB::table('product_size')->where('id', '=', $getSize[0]->id)->update([
                //     'stock' => $newC,
                //     'updated_at' => Carbon::now(),
                // ]);
            }

            $message = 'We received your order!';
            $order = DB::table('orders')->where('cart_id', '=', $process_id)->get();
            $products = DB::table('cart_item')->where('process_id', '=', $process_id)
            ->join('products', 'cart_item.product_id', '=', 'products.id')
            ->select('cart_item.*', 'products.slug as slug', 'products.sku')->get();
        // \Mail::to('sales@farha-fashion.com')->send(new ConfirmEmail($order, $products));
            return view('message', ['message' => $message]);
        }
        }
    }else{
        return redirect('/cart');
    }
}

public function sale()
{
    $sale = DB::table('sale')->join('products', 'sale.product_id', '=', 'products.id')
    ->leftJoin('product_size', 'product_size.product_id', '=', 'sale.product_id')
    ->select('sale.percentage', 'sale.price_after', 'products.*', 'product_size.size')
    ->groupBy('sale.product_id')->paginate(10);
    return view('sale', ['products' => $sale]);
}

public function coupon(Request $request)
{
    $getC = DB::table('coupon')->where('coupon', '=', $request->coupon)->get();
    if(count($getC) > 0){
        if($getC[0]->valid_until > Carbon::now()){
            $update = DB::table('cart')->where('id', '=', $request->cart)->update([
                'coupon' => $request->coupon,
                'percentage' => $getC[0]->percentage,
            ]);
            return Back();
    }else{
        return Redirect::back()->withErrors(['msg' => 'Coupon Expired.']);
    }
}else{
    return Redirect::back()->withErrors(['msg' => 'Invalid coupon code.']);
}
}




public function peak(Request $request, $id)
{
    $product = DB::table('products')->where('id', '=', $id)->get();
    $sale = DB::table('sale')->where('product_id', '=', $product[0]->id)->get();
    $sizes = DB::table('product_size')->where('product_id', '=', $product[0]->id)->get();
    $pictures = DB::table('product_pictures')->where('product_id', '=', $product[0]->id)->get();
    $product_info = DB::table('product_info')->where('product_id', '=', $product[0]->id)->get();
    if(Auth::check()){
        $fav = DB::table('fav')->where('user_id', '=', Auth::user()->id)->get();
    }else{
        $fav = [];
    }
    return view('peak', 
    ['p' => $product, 'fav' => $fav, 'product_info' => $product_info,
     'sale' => $sale, 'sizes' => $sizes,
     'pictures' => $pictures]);

}

public function switchLang(Request $request)
{
    if(session()->get('locale') == 'en'){
        $lang = 'ar';
    }else{
        $lang = 'en';
    }
    App::setLocale($lang);
        session()->put('locale', $lang);
  
        return redirect()->back();
}


public function SubmitForm(Request $request)
{
    \Mail::to('info@farha-fashion.com')->send(new FormSubmit($request));
}

public function sizeChart(Request $request){
    return view('size-chart');
}

}
