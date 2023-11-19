<?php

use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\CommentController;
use App\Http\Controllers\backend\CouponController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\PDFController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\RequirementController;
use App\Http\Controllers\backend\ShipController;
use App\Http\Controllers\backend\SlideController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\frontend\BlogController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\CustomerController;
use App\Http\Controllers\frontend\FilterController;
use App\Http\Controllers\frontend\PageController;
use App\Http\Controllers\frontend\SocialController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route handle page main
Route::get('/', [PageController::class, 'index']);
Route::get('/home', [PageController::class, 'index']);
Route::get('/shop', [PageController::class, 'shop']);
Route::get('/shop/brand/{id}', [PageController::class, 'brand']);
Route::get('/shop/category/{id}', [PageController::class, 'category']);
Route::get('/shop/product/{id}', [PageController::class, 'product']);
Route::get('/contact', [PageController::class, 'contact']);

//Route handle cart
Route::get('/cart', [CartController::class, 'cart']);
Route::get('/checkout', [CartController::class, 'checkout']);
Route::post('/payment', [CartController::class, 'payment']);
Route::post('/payment/online', [CartController::class, 'paymentCreate']);
Route::post('/payment/momo', [CartController::class, 'paymentMomo'])->name('payment.momo');
Route::get('/payment/return', [CartController::class, 'paymentReturn']);
Route::post('/add_to_cart', [CartController::class, 'addToCart']);
Route::post('/update_quantity_cart', [CartController::class, 'updateQuatityCart']);
Route::post('/delete_product_cart', [CartController::class, 'deleteProductCart']);
Route::post('/add_coupon_cart', [CartController::class, 'addCouponCart']);
Route::get('/get_data_cart', [CartController::class, 'getDataCart']);
Route::post('/delete_cart_offset', [CartController::class, 'deteleProductCartOffset']);
Route::post('/get_district_checkout', [CartController::class, 'getDistricCheckout']);
Route::post('/get_ship_checkout', [CartController::class, 'getShipCheckout']);

//Login Google
Route::get('/auth/redirect/{provider}', [SocialController::class, 'redirect']);
Route::get('/callback/{provider}', [SocialController::class, 'callback']);

//Route Chatrealtime
Route::get('/chat', [ChatController::class, 'index'])->name('chat.home');
Route::get('/message/{id}',[ChatController::class, 'getMessage'])->name('chat.message');
Route::post('message', [ChatController::class, 'sendMessage']);

//Route gửi lời nhắn
Route::post('/contact/send', [\App\Http\Controllers\frontend\RequirementController::class, 'send']);

//Route blog
Route::get('/blog', [PageController::class, 'blog']);
Route::get('/blog/{id}', [PageController::class, 'viewBlog']);

//Route Customer
Route::get('/customer', [CustomerController::class, 'index']);
Route::post('/customer/login', [CustomerController::class, 'customerLogin']);
Route::post('/customer/register', [CustomerController::class, 'customerRegister']);
Route::get('/customer/verify/{user_id}/{token}', [CustomerController::class, 'verify'])->name('verify.user');
Route::prefix('customer')->middleware('HandleLoginCustomer')->group(function () {
    Route::get('/profile', [CustomerController::class, 'customerProfile']);
    Route::get('/shipaddres', [CustomerController::class, 'customerShipAddres']);
    Route::post('/logout', [CustomerController::class, 'customerLogout']);
    Route::patch('/change_profile', [CustomerController::class, 'customerChangeProfile']);
    Route::patch('/change_profile_more', [CustomerController::class, 'customerChangeProfileMore']);
    Route::patch('/change_addres', [CustomerController::class, 'customerChangeAddres']);
    Route::get('/order', [CustomerController::class, 'customerOrder']);
    Route::get('/orderdetail/{id}', [CustomerController::class, 'customerOrderDetail']);
    Route::get('/wishlist', [CustomerController::class, 'customerWishList']);
});


Route::post('/handle-wishlist', [CustomerController::class, 'handleWishList']);
Route::post('/add-comment-customer', [CustomerController::class, 'addCommentUser']);
Route::post('/get-data-search', [CustomerController::class, 'getDataSearch']);


Route::get('/admin', [UserController::class, 'getLogin']);
Route::post('/admin', [UserController::class, 'postLogin']);



Route::prefix('admin')->middleware('handleLoginAdmin')->group(function () {
    //Route dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::post('get-data-chart-line', [DashboardController::class, 'getDataChartLine']);
    Route::post('get-data-chart-line-date', [DashboardController::class, 'getDataChartLineDate']);
    Route::get('get-data-chart-pie-city', [DashboardController::class, 'getChartCityBuy']);
    Route::post('filter', [CategoryController::class, 'filter'])->name('category.filter');

    //Route Categorys
    Route::get('/categorys', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/categorys/create', [CategoryController::class, 'create']);
    Route::post('/categorys', [CategoryController::class, 'store']);
    Route::get('/categorys/{id}/edit', [CategoryController::class, 'edit']);
    Route::patch('/categorys/{id}', [CategoryController::class, 'update']);
    Route::delete('/categorys/delete_more', [CategoryController::class, 'delete_more']);
    Route::get('/categorys/export' , [CategoryController::class, 'export'])->name('category.export');
    Route::delete('/categorys/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    //Route Brands
//    Route::resource('/brands', BrandController::class);

    Route::get('/brands', [BrandController::class, 'index'])->name('brand.index');
    Route::get('/brands/create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('/brands', [BrandController::class, 'store']);
    Route::get('/brands/{id}/edit', [BrandController::class, 'edit']);
    Route::patch('/brands/{id}', [BrandController::class, 'update']);
    Route::delete('/brands/{id}', [BrandController::class, 'delete'])->name('brand.destroy');

    //Route products
    Route::get('/products', [ProductController::class, 'index'])->name('product.index');
    Route::get('/products/create', [ProductController::class, 'create']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])
        ->name('product.edit')
        ->middleware(['canNotEdit']);
    Route::patch('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/delete_more', [ProductController::class, 'delete_more'])->name('product.delete_more');
//    Route::get('/products/export' , [ProductController::class, 'export'])->name('product.export');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('/products/{id}', [ProductController::class, 'show']);


    //Route Users
    Route::resource('/users', UserController::class)->middleware('handleRoleAdmin');

    //Route profile admin
    Route::get('/profile/show', [UserController::class, 'showProfileAdmin']);
    Route::get('/profile/update', [UserController::class, 'showFormUpdateAdmin']);
    Route::patch('/profile/update', [UserController::class, 'updateProfileAdmin']);
    Route::get('/profile/logout', [UserController::class, 'logoutAdmin']);

    //Route orders
    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders/{id}', [OrderController::class, 'show']);
    Route::patch('/orders/{id}', [OrderController::class, 'update']);
    Route::delete('/orders/{id}', [OrderController::class, 'destroy']);
    //Export PDF
    Route::get('/generate-pdf/{id}', [PDFController::class, 'generatePDF']);

    //Route comments
    Route::get('/comments', [CommentController::class, 'index']);
    Route::get('/comments/{id}', [CommentController::class, 'show']);
    Route::delete('/comments/{id}', [CommentController::class, 'destroy']);
    Route::patch('/comments/{id}', [CommentController::class, 'update']);
    Route::patch('/comments/slide/{id}', [CommentController::class, 'slideOn']);
    Route::patch('/comments/off/{id}', [CommentController::class, 'slideOff']);

    //Route ships
    Route::get('/ships', [ShipController::class, 'index']);
    Route::get('/ships/create', [ShipController::class, 'create']);
    Route::get('/ships/{id}/edit', [ShipController::class, 'edit']);
    Route::post('/ships', [ShipController::class, 'store']);
    Route::post('/ships/{id}', [ShipController::class, 'update']);
    Route::delete('/ships/{id}', [ShipController::class, 'destroy']);
    Route::post('/city-id', [ShipController::class, 'getDataDistricts']);

    //Route coupons
    Route::get('/coupons', [CouponController::class, 'index']);
    Route::get('/coupons/create', [CouponController::class, 'create']);
    Route::get('/coupons/{id}/edit', [CouponController::class, 'edit']);
    Route::post('/coupons', [CouponController::class, 'store']);
    Route::post('/coupons/{id}', [CouponController::class, 'update']);
    Route::delete('/coupons/{id}', [CouponController::class, 'destroy']);

    //Route slides
    Route::get('/slides', [SlideController::class, 'index']);
    Route::get('/slides/create', [SlideController::class, 'create']);
    Route::get('/slides/{id}/edit', [SlideController::class, 'edit']);
    Route::post('/slides', [SlideController::class, 'store']);
    Route::post('/slides/{id}', [SlideController::class, 'update']);
    Route::delete('/slides/{id}', [SlideController::class, 'destroy']);

    //Route requirements
    Route::get('/requirements', [RequirementController::class, 'index']);
    Route::get('/requirements/{id}', [RequirementController::class, 'update']);
    Route::delete('/requirements/{id}', [RequirementController::class, 'destroy']);

    //Route posts
    Route::get('/posts', [PostController::class, 'index']);
    Route::get('/posts/create', [PostController::class, 'create']);
    Route::get('/posts/{id}/edit', [PostController::class, 'edit']);
    Route::post('/posts', [PostController::class, 'store']);
    Route::post('/posts/{id}', [PostController::class, 'update']);
    Route::delete('/posts/{id}', [PostController::class, 'destroy']);
});

//Route handle Filemanager
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

//Route link storage with puplic
Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
    echo "Link done !";
});


//Route clear cache, optimize
Route::get('/optimize', function () {
    Artisan::call('optimize');
    echo "Optimize done !";
});

Route::match(['get', 'post'], '/botman', [BotManController::class,"handle"]);

Route::post('/ghtk', [CartController::class, 'getInformatioOrder'])->name('ghtk.getInformatioOrder');
Route::post('/ghtk/shipping_fee', [CartController::class, 'getShippingPrice'])->name('ghtk.getShippingPrice');
