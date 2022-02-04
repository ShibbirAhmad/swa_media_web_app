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
 Route::get('/our-team',[IndexController::class,'team']);
 Route::get('/our-services',[IndexController::class,'service'])->name('service');
 Route::get('/logo-design',[IndexController::class,'logoDesign'])->name('logo.design');
 Route::get('/business-card',[IndexController::class,'businessCard'])->name('business.card');
 Route::get('/service-details/{id}',[IndexController::class,'serviceDetails'])->name('service.details');
//cart routes
 Route::get('cart/view', [CartController::class, 'viewCart'])->name('cart_view');
 Route::post('api/add/cart/{id}', [CartController::class, 'addCart'])->name('cart_add');
 Route::post('api/cart/item/update', [CartController::class, 'cartUpdate'])->name('cart_update');
 Route::get('api/cart/remove/{rowId}', [CartController::class, 'cartDestroy'])->name('cart_remove');
 Route::get('api/cart/content', [CartController::class, 'cartContent'])->name('cart_content');
//service order routes
 Route::post('api/create/service/order',[ServiceOrder::class,'storeOrder']);

////start admin route
Route::group([
    'prefix' => 'admin',
    'middleware' => 'admin',
], function () {

    Route::get('/home', [HomeController::class, 'index'])->name('admin.home');
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

Route::get('/admins', [AdminController::class, 'allAdmin'])->name('allAdmin');
Route::get('/admin/add', [AdminController::class, 'addAdmin'])->name('admin.create');
Route::post('/admin/store', [AdminController::class, 'storeAdmin'])->name('admin.store');
Route::get('/admin/edit/{id}', [AdminController::class, 'editAdmin'])->name('admin.edit');
Route::post('/admin/update/{id}', [AdminController::class, 'updateAdmin'])->name('admin.update');
Route::get('/admin/status/{id}', [AdminController::class, 'status'])->name('admin.status');

//Service Order Controller
Route::get('service/order', [ServiceOrderController::class, 'serviceOrders'])->name('service.order');
Route::get('service/order/item', [ServiceOrderController::class, 'serviceOrderItem'])->name('service.orderItem');
