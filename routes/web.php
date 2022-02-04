<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\ServiceOrderController as ServiceOrder;
use App\Http\Controllers\Admin\CompanyLogoController;
use App\Http\Controllers\Admin\ServiceOrderController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ServiceOrderController as AdminServiceOrderController;
use App\Http\Controllers\Admin\UserController;



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

 Route::get('/',[IndexController::class,'index'])->name('welcome');
 Route::get('our-team',[IndexController::class,'team']);
 Route::get('logo-design',[IndexController::class,'logoDesign'])->name('logo.design');
 Route::get('business-card',[IndexController::class,'businessCard'])->name('business.card');
 Route::get('services',[IndexController::class,'service'])->name('service');
 Route::post('service/search',[IndexController::class,'serviceSearch'])->name('search_service');
 Route::get('service-details/{id}',[IndexController::class,'serviceDetails'])->name('service.details');
//cart routes
 Route::get('cart/view', [CartController::class, 'viewCart'])->name('cart_view');
 Route::post('api/add/cart/{id}', [CartController::class, 'addCart'])->name('cart_add');
 Route::post('api/cart/item/update', [CartController::class, 'cartUpdate'])->name('cart_update');
 Route::get('cart/remove/{rowId}', [CartController::class, 'cartDestroy'])->name('cart_remove');
 Route::get('cart/content', [CartController::class, 'cartContent'])->name('cart_content');
//service order routes
 Route::post('api/create/service/order',[ServiceOrder::class,'storeOrder']);
 Route::get('contact',[IndexController::class,'contact'])->name('contact');
 Route::get('support',[IndexController::class,'support'])->name('support');
 Route::get('about',[IndexController::class,'about'])->name('about');
 Route::get('company',[IndexController::class,'company'])->name('company');

 //sign up



 Route::group([
    'middleware' => 'auth'
], function () {

    //user dashboard
    Route::get('/dashboard', [ServiceOrderController::class, 'index'])->name('user.dashboard');

});


 Route::get('api/create/service/order',[ServiceOrderController::class,'storeOrder']);

////start admin route
Route::group([
    'prefix' => 'admin',
    'middleware' => 'admin',
], function () {

    Route::get('/home', [HomeController::class, 'index'])->name('admin.home');
    /*--- Service Controller Start ---*/
    Route::get('service/order', [AdminServiceOrderController::class, 'serviceOrders'])->name('service.order');
    Route::get('service/order/item', [AdminServiceOrderController::class, 'serviceOrderItem'])->name('service.orderItem');
    /*--- Service Controller End ---*/




    //resource route
    Route::resources([
        'page' => PageController::class,
        'category' => CategoryController::class,
        'team' => TeamController::class,
        'client' => ClientController::class,
        'general_setting' => GeneralSettingController::class,
        'slider' => SliderController::class,
        'banner' => BannerController::class,
        'company_logo' => CompanyLogoController::class,
        'service' => ServiceController::class,
    ]);
});

Auth::routes();


Route::get('/admin/login', [HomeController::class, 'login'])->name('admin.login');

/*-- Create Admin From Admin Dashboard --*/
Route::get('/admins', [UserController::class, 'allAdmin'])->name('allAdmin');
Route::get('/admin/add', [UserController::class, 'addAdmin'])->name('admin.create');
Route::post('/admin/store', [UserController::class, 'storeAdmin'])->name('admin.store');
Route::get('/admin/edit/{id}', [UserController::class, 'editAdmin'])->name('admin.edit');
Route::post('/admin/update/{id}', [UserController::class, 'updateAdmin'])->name('admin.update');
Route::get('/admin/status/{id}', [UserController::class, 'status'])->name('admin.status');
/*-- Create Admin From Admin Dashboard --*/

/*--- Service Controller Start ---*/
// Route::get('service/order', [AdminServiceOrderController::class, 'serviceOrders'])->name('service.order');
// Route::get('service/order/item', [AdminServiceOrderController::class, 'serviceOrderItem'])->name('service.orderItem');
/*--- Service Controller End ---*/

//Contact Controller
Route::post('contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('contacts', [ContactController::class, 'index'])->name('contact.index');
