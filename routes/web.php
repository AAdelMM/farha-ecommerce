<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
// MAIN DASHBOARD CONTROLLERS. 
use App\Http\Controllers\NavController;
use App\Http\Controllers\HomeMetaController;
use App\Http\Controllers\NavLogoController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\FaviconController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostsTagsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\InteriorCategoryController;
use App\Http\Controllers\InteriorController;
use App\Http\Controllers\AllProductsController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\FaceBookController;
use App\Http\Controllers\BuildController;
use App\Http\Controllers\MainCatController;
use App\Http\Livewire\ProductView;

// Facebook Login URL
Route::prefix('facebook')->name('facebook.')->group( function(){
    Route::get('auth', [FaceBookController::class, 'loginUsingFacebook'])->name('login');
    Route::get('callback', [FaceBookController::class, 'callbackFromFacebook'])->name('callback');
});


Route::post('/coupon', [PublicController::class, 'coupon']);
Route::post('form-submit', [PublicController::class, 'SubmitForm']);
Route::get('/switch', [PublicController::class, 'switchLang']);
Route::post('/show/product/{id}', [PublicController::class, 'peak']);
Route::post('update-cart', [PublicController::class, 'UpdateCartCount']);
Route::post('fav', [PublicController::class, 'AddToFav']);
Route::post('get-sub', [PublicController::class, 'GetSub']);
Route::post('get-sub2', [PublicController::class, 'GetSub2']);
Route::middleware(['ShareCat'])->group(function () {
	

	
Route::get('/build', [BuildController::class, 'index']);
Route::post('/build-elevator', [BuildController::class, 'create']);



	Route::get('my-fav', [PublicController::class, 'AllFav']);
	Route::get('/privacy', function(){
		return view('privacy');
	});
	Route::get('sale', [PublicController::class, 'sale']);
	Route::get('size-chart', [PublicController::class, 'sizeChart']);
	Route::post('search', [PublicController::class, 'search']);
	Route::get('/', [PublicController::class, 'index'])->name('home');
	Route::get('/home2', [PublicController::class, 'index2'])->name('home2');
	Auth::routes();

	Route::get('/cat/{id}',[PublicController::class, 'ShowCat']);
	Route::get('/subcat/{id}',[PublicController::class, 'ShowSubCat']);
	Route::post('/cart', [PublicController::class, 'LoadCart']);
	Route::delete('/deletecart', [PublicController::class, 'deleteCart']);
	Route::get('/products/{slug}', [PublicController::class, 'showproduct']);
	Route::get('all/products', [PublicController::class, 'allProducts']);
	Route::get('/all/categories', [PublicController::class, 'allCategories']);
	Route::get('contact-us', [PublicController::class, 'contactUs']);
	Route::get('blog', [PublicController::class, 'blog']);
	Route::get('blog/post/{id}', [PublicController::class, 'blogPost']);
	Route::get('/cart', [PublicController::class, 'CartPage']);
	Route::get('checkout', [PublicController::class, 'checkout']);
	Route::post('/get-size', [PublicController::class, 'getSize']);
	
	Route::post('checkout', [PublicController::class, 'placeOrder']);
	Route::post('user-info', [PublicController::class, 'SaveUserInfo']);
});




Route::group(['middleware' => 'auth'], function () {
	
	// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
Route::middleware(['middleware' => 'Admin'])->group(function () {

	Route::get('elev', [BuildController::class, 'admin']);
	Route::get('/stage/{id}/approve', [BuildController::class, 'approve']);
	Route::delete('/stage/{id}', [BuildController::class, 'delete']);
	Route::get('/stage/product/{id}', [BuildController::class, 'product']);

	Route::get('/dashboard', 'App\Http\Controllers\HomeController@index');
	Route::resource('shipping', ShippingController::class);
		// navigation controller
		Route::resource('nav', NavController::class);
		//	Route::put('nav/{id}', 'App\Http\Controllers\NavController@update');

		// Home meta tags controller
		Route::resource('home-meta', HomeMetaController::class);
	
		// Route::middleware(['SuperUser'])->group(function () {});

		// Nav Logo Controller
		Route::resource('navlogo', NavLogoController::class);

		// Slider Controller
		Route::resource('slider', SliderController::class);
	
		// Favicon Controller
		Route::resource('favicon', FaviconController::class);
	
		// Services Controller
		Route::resource('service', ServiceController::class);
		
		// About us Controller
		Route::resource('about', AboutController::class);
	
		// Map link Controller
		Route::resource('map', MapController::class);
	
		// social media Controller
		Route::resource('social', SocialController::class);
	
		// user Controller
		Route::resource('user', UserController::class);
	
		// Posts tags Controller
		Route::resource('postags', PostsTagsController::class);
	
		// Posts Controller
		Route::resource('post', PostsController::class);
	
		// Team Controller
		Route::resource('team', TeamController::class);
	
		// Logo Controller
		Route::resource('logo', LogoController::class);
	
		// Testimonial Controller
		Route::resource('testimonial', TestimonialsController::class);
	
		// phone Controller
		Route::resource('phone', PhoneController::class);

		// interior Controller
		Route::resource('interior', InteriorController::class);

		// interior Controller
		Route::resource('interior-cat', InteriorCategoryController::class);

		//Products - categories
		Route::get('product-cat', [AllProductsController::class, 'showCategories']);
		Route::get('product-cat/create', [AllProductsController::class, 'addCategories']);
		Route::post('product-cat/create', [AllProductsController::class, 'insertCategories']);
		Route::delete('product-cat/{id}', [AllProductsController::class, 'destroyCategories']);
		Route::get('product-cat/{id}', [AllProductsController::class, 'editCategories']);
		Route::post('product-cat/update', [AllProductsController::class, 'updateCategories']);
		
		//Products - main categories
		Route::get('product-main-cat', [MainCatController::class, 'showCategories']);
		Route::get('product-main-cat/create', [MainCatController::class, 'addCategories']);
		Route::post('product-main-cat/create', [MainCatController::class, 'insertCategories']);
		Route::delete('product-main-cat/{id}', [MainCatController::class, 'destroyCategories']);
		Route::get('product-main-cat/{id}', [MainCatController::class, 'editCategories']);
		Route::post('product-main-cat/update', [MainCatController::class, 'updateCategories']);

		Route::get('product-subcat', [AllProductsController::class, 'showSubCategories']);
		Route::get('product-subcat/create', [AllProductsController::class, 'addSubCategories']);
		Route::post('product-subcat/create', [AllProductsController::class, 'insertSubCategories']);
		Route::delete('product-subcat/{id}', [AllProductsController::class, 'destroySubCategories']);
		Route::get('product-subcat/{id}', [AllProductsController::class, 'editSubCategories']);
		Route::post('product-subcat/update', [AllProductsController::class, 'updateSubCategories']);
		Route::get('/product-subcat/{id}/show', [AllProductsController::class, 'SHowSubProducts']);


		Route::get('product', [AllProductsController::class, 'showProducts']);
		Route::get('product/create', [AllProductsController::class, 'addProduct']);
		Route::post('product/create', [AllProductsController::class, 'insertProduct']);
		Route::delete('product/{id}', [AllProductsController::class, 'destroyProduct']);
		Route::get('product/{id}', [AllProductsController::class, 'editProduct']);
		Route::post('product/update', [AllProductsController::class, 'updateproduct']);
		
		Route::get('product/{id}/show', [AllProductsController::class, 'ProductPage']);
		Route::get('product/{id}/sale', [AllProductsController::class, 'ProductSale']);
		Route::post('product/{id}/sale', [AllProductsController::class, 'InsertSale']);
		Route::delete('product/{id}/sale', [AllProductsController::class, 'deleteSale']);

		Route::get('product/{id}/picture', [AllProductsController::class, 'ProductPicture']);
		Route::post('product/{id}/picture', [AllProductsController::class, 'InsertProductPicture']);
		Route::delete('product/{id}/picture', [AllProductsController::class, 'destroyImage']);


		Route::get('product/{id}/info', [AllProductsController::class, 'addInfo']);
		Route::post('product/{id}/info', [AllProductsController::class, 'insertInfo']);
		Route::delete('product/{id}/info', [AllProductsController::class, 'destroyInfo']);



		Route::get('product/{id}/size', [AllProductsController::class, 'addSize']);
		Route::post('product/{id}/size', [AllProductsController::class, 'insertSize']);
		Route::delete('product/{id}/size', [AllProductsController::class, 'destroySize']);


		Route::get('product/{id}/sticker', [AllProductsController::class, 'addSticker']);
		Route::post('product/{id}/sticker', [AllProductsController::class, 'insertSticker']);
		Route::delete('product/{id}/sticker', [AllProductsController::class, 'destroySticker']);

		Route::get('product/{id}/color/{color}', [AllProductsController::class, 'addColor']);
		Route::post('product/{id}/color/{color}', [AllProductsController::class, 'insertColor']);
		Route::delete('product/{id}/color', [AllProductsController::class, 'destroyColor']);


		Route::get('product/{id}/color-heading', [AllProductsController::class, 'addColorHeading']);
		Route::post('product/{id}/color-heading', [AllProductsController::class, 'insertColorHeading']);
		Route::get('product/{id}/color-heading/edit', [AllProductsController::class, 'editColorHeading']);
		Route::post('product/{id}/color-heading/edit', [AllProductsController::class, 'updateColorHeading']);
		Route::delete('product/{id}/color-heading', [AllProductsController::class, 'destroyColorHeading']);


		Route::get('sub-color/{id}', [AllProductsController::class, 'addSubColor']);
		Route::post('sub-color/{id}', [AllProductsController::class, 'insertSubColor']);
		Route::delete('sub-color/{id}', [AllProductsController::class, 'destroySubColor']);

		Route::get('sub-sub-color/{id}', [AllProductsController::class, 'addSubSubColor']);
		Route::post('sub-sub-color/{id}', [AllProductsController::class, 'insertSubSubColor']);
		Route::delete('sub-sub-color/{id}', [AllProductsController::class, 'destroySubSubColor']);



		Route::get('/orders', [OrdersController::class, 'index']);
		Route::get('/orders/{id}', [OrdersController::class, 'check']);
		Route::get('/orders/{id}/show', [OrdersController::class, 'show']);
		Route::post('/process', [OrdersController::class, 'returnOrder']);
		Route::delete('/cancel-order/{id}', [OrdersController::class, 'CancelOrder']);



		Route::get('/coupons', [CouponController::class, 'index']);
		Route::get('/coupons/create', [CouponController::class, 'create']);
		Route::post('/coupons', [CouponController::class, 'insert']);
		Route::delete('/coupons/{id}', [CouponController::class, 'deleteCou']);
		Route::get('/coupons/{id}/edit', [CouponController::class, 'edit']);
		Route::post('/coupons/{id}/edit', [CouponController::class, 'update']);
	});
});

