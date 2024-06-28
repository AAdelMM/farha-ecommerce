<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class AllProductsController extends Controller
{
    //
    public function showCategories()
    {
        $cat = DB::table('categories')
        // ->leftJoin('main_cat', 'main_cat.id', '=', 'categories.main_cat_id')
        ->select('categories.*'
        // , 'main_cat.name as main_cat_name'
        )
        ->paginate(10);
        return view('products.cat', ['cat' => $cat]);
    }

    public function addCategories()
    {
        $main = DB::table('main_cat')->get();
        return view('products.cat-add', ['main' => $main]);
    }

    public function insertCategories(Request $request)
    {
        // 
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $avatar = time().'.'.$request->avatar->extension();  
        $request->avatar->move(public_path('uploads/'), $avatar);

        $insert = DB::table('categories')->insert([
            'avatar' => $avatar,
            'name' => $request->name,
            'name_ar' => $request->name_ar,
            // 'main_cat_id' => $request->main_cat_id,
            'created_at' => Carbon::now()
        ]);
        if($insert){
            return redirect('/product-cat');
        }
    }

    public function destroyCategories(Request $request, $id)
    {
        $delete = DB::table('categories')->where('id', '=', $id)->delete();
        if($delete){
            return Back();
        }
    }

    public function editCategories($id)
    {
        $getCat = DB::table('categories')->find($id);
        // $main = DB::table('main_cat')->get();
        return view('products.cat-edit', ['cat' => $getCat
        // , 'main' => $main
    ]);
    }

    public function updateCategories(Request $request)
    {
        $oldP = DB::table('categories')->find($request->id);
        $name = $_POST['name'];
        $fileInput = $request->all();
        if($file = $request->file('avatar')){
            $firstContact = $file->getClientOriginalName();
            $avatar = date('s-m') . str_replace(' ', '-', $firstContact);
            $file->move('uploads/', $avatar);
        }else{
            $avatar = $oldP->avatar;
        }

        $update = DB::table('categories')->where('id', '=', $request->id)->update([
            'name' => $request->name,
            'name_ar' => $request->name_ar,
            'avatar' => $avatar,
            // 'main_cat_id' => $request->main_cat_id,
            'updated_at' => Carbon::now(),
        ]);
        
        if($update){
            return redirect('/product-cat');
        }else{
            return Back();
        }

    }
    
    public function showSubCategories()
    {
        $cat = DB::table('sub_category')->paginate(10);
        return view('products.subcat', ['cat' => $cat]);
    }

    public function addSubCategories()
    {
        $cats = DB::table('categories')->get();
        return view('products.subcat-add', ['cats' => $cats]);
    }

    public function insertSubCategories(Request $request)
    {
        // 
       $cat = DB::table('categories')->find($request->category_id);
        $insert = DB::table('sub_category')->insert([
            'category_name' => $cat->name,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_name_ar' => $request->subcategory_name_ar,
            'category_id' => $request->category_id,
            'created_at' => Carbon::now()
        ]);
        if($insert){
            return redirect('/product-subcat');
        }
    }

    public function destroySubCategories(Request $request, $id)
    {
        $delete = DB::table('sub_category')->where('id', '=', $id)->delete();
        if($delete){
            return Back();
        }
    }

    public function editSubCategories($id)
    {
        $getCat = DB::table('categories')->get();
        $getSub = DB::table('sub_category')->find($id);
        return view('products.subcat-edit', ['cats' => $getCat, 'sub' => $getSub]);
    }

    public function updateSubCategories(Request $request)
    {
        $cat = DB::table('categories')->find($request->category_id);

        $update = DB::table('sub_category')->where('id', '=', $request->id)->update([
            'category_name' => $cat->name,
            'subcategory_name' => $request->name,
            'subcategory_name_ar' => $request->subcategory_name_ar,
            'category_id' => $request->category_id,
            'updated_at' => Carbon::now()
        ]);
        
        if($update){
            return redirect('/product-subcat');
        }else{
            return Back();
        }

    }
    
    
    public function showProducts()
    {
        $products = DB::table('products')->leftJoin('categories', 'products.category_id', '=', 'categories.id')
        ->leftjoin('sub_category', 'products.subcategory_id', '=', 'sub_category.id')
        ->select('products.*', 'categories.name as category_name',
        'sub_category.subcategory_name as subcategory_name')
        ->orderBy('products.id', 'DESC')->paginate(10);

        return view('products.show', ['products' => $products]);
    }

    public function addProduct()
    {
        $categories = DB::table('categories')
        // ->leftJoin('main_cat', 'categories.main_cat_id', '=', 'main_cat.id')
        ->select('categories.*'
        // , 'main_cat.name as main_cat_name'
        )
        ->get();
        $sub = DB::table('sub_category')->get();
        return view('products.create', ['categories' => $categories, 'sub' => $sub]);
    }

    public function insertProduct(Request $request)
    {
        $getSub = DB::table('sub_category')->find($request->category);
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $avatar = time().'.'.$request->avatar->extension();  
        $request->avatar->move(public_path('uploads/'), $avatar);

        $insert = DB::table('products')->insert([
            'avatar' => $avatar,
            'slug' => substr(date('YmdHis', strtotime(Carbon::now())), 4),
            'name' => $request->name,
            'sku' => $request->sku,
            'description' => $request->description,
            'name_ar' => $request->name_ar,
            'description_ar' => $request->description_ar,
            'price' => $request->price,
            'subcategory_id' => $request->category,
            'category_id' => $getSub->category_id,
            'created_at' => Carbon::now(),
        ]);
        if($insert){
            return redirect('/product');
        }else{
            return Back();
        }

    }

    public function destroyProduct(Request $request, $id)
    {
        $delete = DB::table('products')->where('id', '=', $id)->delete();
        if($delete){
            return Back();
        }
    }

    public function editProduct($id)
    {
        $product = DB::table('products')->find($id);
        $categories = DB::table('categories')
        ->select('categories.*')
        ->get();
        $sub = DB::table('sub_category')->get();
        return view('products.edit', ['product' => $product, 'categories' => $categories, 'sub' => $sub]);
    }

    public function updateproduct(Request $request)
    {
        $getSub = DB::table('sub_category')->find($request->category);
        $oldP = DB::table('products')->find($request->id);
        $fileInput = $request->all();
        if($file = $request->file('avatar')){
            $firstContact = $file->getClientOriginalName();
            $avatar = date('s-m') . str_replace(' ', '-', $firstContact);
            $file->move('uploads/', $avatar);
        }else{
            $avatar = $oldP->avatar;
        }

        $update = DB::table('products')->where('id', '=', $request->id)->update([
            'avatar' => $avatar,
            'name' => $request->name,
            'sku' => $request->sku,
            'description' => $request->description,
            'name_ar' => $request->name_ar,
            'description_ar' => $request->description_ar,
            'price' => $request->price,
            'subcategory_id' => $request->category,
            'category_id' => $getSub->category_id,
            'updated_at' => Carbon::now(),
        ]);
        
        if($update){
            return redirect($request->url);
        }else{
            return Back();
        }

    }


    public function ProductPage($id)
    {
        $product = DB::table('products')->find($id);
        $sale = DB::table('sale')->where('product_id', '=', $id)->get();
        $images = DB::table('product_pictures')->where('product_id', '=', $id)->get();
        $info = DB::table('product_info')->where('product_id', '=', $id)->get();
        $size = DB::table('product_size')->where('product_id', '=', $id)->get();
        $color = DB::table('product_color')->where('product_id', '=', $id);
        $subColor = DB::table('product_sub_color')->where('product_id', '=', $id);
        $product_color_heading = DB::table('product_color_heading')->where('product_id', '=', $id)->get();
        $sticker = DB::table('product_sticker')->where('product_id', '=', $id)->get();
        $subSubColor = DB::table('product_sub_sub_color')->where('product_id', '=', $id);
        return view('products.show-product', [
        'product' => $product, 'sale' => $sale, 
        'images' => $images, 'info' => $info, 
        'size' => $size, 'color' => $color, 'sticker' => $sticker, 
        'subColor' => $subColor, 'subSubColor' => $subSubColor, 
        'product_color_heading' => $product_color_heading]);
    }

    public function ProductSale($id)
    {
        $sale = DB::table('sale')->where('product_id', '=', $id)->get();
        if(count($sale) == 0){
            return view('products.add-sale', ['product_id' => $id]);
        }else{
            return Back();
        }
    }
    public function InsertSale(Request $request, $id)
    {
       $insert = DB::table('sale')->insert([
        'product_id' => $request->product_id,
        'percentage' => $request->percentage,
        'price_after' => $request->price_after,
        'created_at' => Carbon::now(),
       ]);
       $url = '/product' . '/' . $request->product_id . '/show';
       if($insert){
        return redirect($url);
       }else{
        return Back();
       }
    }

    public function deleteSale(Request $request, $id)
    {
        $delete = DB::table('sale')->where('id', '=', $id)->delete();
        if($delete) return Back();
    }

    public function ProductPicture($id)
    {
        return view('products.add-picture', ['id' => $id]);
    }
    public function InsertProductPicture(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $image = time().'.'.$request->image->extension();  
        $request->image->move(public_path('uploads/'), $image);  
        
        $insert = DB::table('product_pictures')->insert([
            'picture' => $image,
            'product_id' => $id,
            'created_at' => Carbon::now(),
        ]);
        if($insert){
            return redirect('/product/'.$id.'/show');
        }else{
            return Back();
        }
    }
    public function destroyImage(Request $request, $id)
    {
        $delete = DB::table('product_pictures')->where('id', '=', $id)->delete();

        if($delete) return Back();
    }

    public function addInfo($id)
    {
        return view('products.add-info', ['id' => $id]);
    }
    public function insertInfo(Request $request, $id)
    {
        $insert = DB::table('product_info')->insert([
            'title' => $request->title,
            'description' => $request->text,
            'title_ar' => $request->title_ar,
            'description_ar' => $request->text_ar,
            'product_id' => $id,
            'created_at' => Carbon::now(),
        ]);
        if($insert) return redirect('/product/' . $id . '/show');
    }
    public function destroyInfo(Request $request, $id)
    {
        $delete = DB::table('product_info')->where('id', '=', $id)->delete();
        if($delete) return Back();
    }


    public function addSize($id)
    {
        $color = DB::table('product_color')->where('product_id', '=', $id)->get();
        return view('products.add-size', ['id' => $id, 'color' => $color]);
    }
    public function insertSize(Request $request, $id)
    {
        $request->validate(['image' => 'required|image|mimes:jpeg,png,jpg|max:2048',]);
        $image = time().'.'.$request->image->extension();  
        $request->image->move(public_path('uploads/'), $image); 

        $color = DB::table('product_color')->find($request->color_id);
        $insert = DB::table('product_size')->insert([
            'size' => $request->size,
            'image' => $image,
            'stock' => $request->stock,
            'color_id' => $request->color_id,
            'color_name'=> $color->color, 
            'color_name_ar'=> $color->color_ar, 
            'product_id' => $id,
            'created_at' => Carbon::now(),
        ]);
        if($insert) return redirect('/product/'.$id.'/show');
    }
    public function destroySize(Request $request, $id)
    {
        $delete = DB::table('product_size')->where('id', '=', $id)->delete();
        if($delete) return Back();
    }
    public function addSticker($id)
    {
        $color = DB::table('product_color')->where('product_id', '=', $id)->get();
        return view('products.add-sticker', ['id' => $id, 'color' => $color]);
    }
    public function insertSticker(Request $request, $id)
    {
        $request->validate(['product_sticker' => 'required|image|mimes:jpeg,png,jpg|max:2048',]);
        $product_sticker = time().'.'.$request->product_sticker->extension();  
        $request->product_sticker->move(public_path('uploads/'), $product_sticker); 

        $request->validate(['sticker' => 'required|image|mimes:jpeg,png,jpg|max:2048',]);
        $sticker = time().'4.'.$request->sticker->extension();  
        $request->sticker->move(public_path('uploads/'), $sticker); 

        $color = DB::table('product_color')->find($request->color_id);
        $insert = DB::table('product_sticker')->insert([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'product_sticker' => $product_sticker,
            'sticker' => $sticker,
            'product_color' => $request->product_color,
            'product_sub_color' => $request->product_sub_color,
            'product_sub_sub_color' => $request->product_sub_sub_color,
            'product_id' => $id,
            'created_at' => Carbon::now(),
        ]);
        if($insert) return redirect('/product/'.$id.'/show');
    }
    public function destroySticker(Request $request, $id)
    {
        $delete = DB::table('product_sticker')->where('id', '=', $id)->delete();
        if($delete) return Back();
    }

    public function addColor($id, $color)
    { 
        return view('products.add-color', ['id' => $id, 'color' => $color]);
    }

    public function insertColor(Request $request, $id, $color)
    { 
        
        
        $request->validate(['color_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',]);
        $color_image = time().'.'.$request->color_image->extension();  
        $request->color_image->move(public_path('uploads/'), $color_image); 
        
        $insert = DB::table('product_color')->insert([
            'color' => $request->color,
            'color_ar' => $request->color_ar,
            'color_code' => $request->color_code,
            'color_image' => $color_image,
            'product_id' => $id,
            'color_heading' => $color,
            'created_at' => Carbon::now(),
        ]);
        if($insert) return redirect('/product/'.$id.'/show');
    }

    public function destroyColor(Request $request, $id)
    { $delete = DB::table('product_color')->where('id', '=', $id)->delete();
        if($delete) return Back();
    }
    public function addColorHeading($id)
    { 
        return view('products.add-color-heading', ['id' => $id]);
    }

    public function insertColorHeading(Request $request, $id)
    { 
        
        
        $request->validate(['product_picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',]);
        $product_picture = time().'.'.$request->product_picture->extension();  
        $request->product_picture->move(public_path('uploads/'), $product_picture); 
        
        $insert = DB::table('product_color_heading')->insert([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'title_ar' => $request->title_ar,
            'title_en' => $request->title_en,
            'product_picture' => $product_picture,
            'product_id' => $id,
            'created_at' => Carbon::now(),
        ]);
        if($insert) return redirect('/product/'.$id.'/show');
    }

    public function destroyColorHeading(Request $request, $id)
    { $delete = DB::table('product_color_heading')->where('id', '=', $id)->delete();
        if($delete) return Back();
    }
    public function editColorHeading(Request $request, $id)
    { $color = DB::table('product_color_heading')->find($id);
        return view('products.edit-color-heading', ['c' => $color]);
    }
    public function updateColorHeading(Request $request, $id)
    { 
        $color = DB::table('product_color_heading')->find($id);
        $update = DB::table('product_color_heading')->where('id', '=', $id)->update([
        'name_en'=> $request->name_en,
        'name_ar'=> $request->name_ar,
        'title_en'=> $request->title_en,
        'title_ar'=> $request->title_ar,
        'color_code'=> $request->color_code,
    ]);
    return redirect('/product/'.$color->product_id.'/show');
    }

    public function addSubColor($id)
    { 
        return view('products.add-sub-color', ['id' => $id]);
    }

    public function insertSubColor(Request $request, $id)
    { 
        
        $color = DB::table('product_color')->find($id);
        $request->validate(['color_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',]);
        $color_image = time().'.'.$request->color_image->extension();  
        $request->color_image->move(public_path('uploads/'), $color_image); 
        
        $insert = DB::table('product_sub_color')->insert([
            'color' => $request->color,
            'color_ar' => $request->color_ar,
            'color_code' => $request->color_code,
            'color_image' => $color_image,
            'product_id' => $color->product_id,
            'color_id' => $id,
            'created_at' => Carbon::now(),
        ]);
        if($insert) return redirect('/product/'.$color->product_id.'/show');
    }

    public function destroySubColor(Request $request, $id)
    { $delete = DB::table('product_sub_color')->where('id', '=', $id)->delete();
        if($delete) return Back();
    }
    public function addSubSubColor($id)
    { 
        return view('products.add-sub-sub-color', ['id' => $id]);
    }

    public function insertSubSubColor(Request $request, $id)
    { 
        
        $subColor = DB::table('product_sub_color')->find($id);
        $request->validate(['color_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',]);
        $color_image = time().'.'.$request->color_image->extension();  
        $request->color_image->move(public_path('uploads/'), $color_image); 
        // $color = DB::table('product_color')->find($subColor->color_id);
        $insert = DB::table('product_sub_sub_color')->insert([
            'color' => $request->color,
            'color_ar' => $request->color_ar,
            'color_code' => $request->color_code,
            'color_image' => $color_image,
            'product_id' => $subColor->product_id,
            'sub_color_id' => $id,
            'color_id' => $subColor->color_id,
            'created_at' => Carbon::now(),
        ]);
        if($insert) return redirect('/product/'.$subColor->product_id.'/show');
    }

    public function destroySubSubColor(Request $request, $id)
    { $delete = DB::table('product_sub_sub_color')->where('id', '=', $id)->delete();
        if($delete) return Back();
    }

    public function SHowSubProducts($id)
    {
        $products = DB::table('products')->where('subcategory_id', '=', $id)->leftJoin('categories', 'products.category_id', '=', 'categories.id')
        ->leftjoin('sub_category', 'products.subcategory_id', '=', 'sub_category.id')
        ->select('products.*', 'categories.name as category_name',
        'sub_category.subcategory_name as subcategory_name')
        ->orderBy('products.sku', 'ASC')->paginate(10);

    return view('products.show', ['products' => $products]);
    }



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // Additional validations for other fields
        ]);

        // Save base product details
        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->description = $request->description;
        $product->price = $request->price;
        // ... set other fields as required

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('uploads/customerUploads', 'public');
            $product->avatar = $avatarPath;
        }
        $product->save();

        // Save custom images if any
        if ($request->has('custom_images')) {
            foreach ($request->file('custom_images') as $image) {
                $customImagePath = $image->store('uploads/customerUploads', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $customImagePath,
                    'type' => 'custom'
                ]);
            }
        }

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    
}

