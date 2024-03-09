<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Backend\AboutContent;
use App\Http\Livewire\Backend\LoginContent;
use App\Http\Livewire\Backend\RolesContent;
use App\Http\Livewire\Backend\SlideContent;
use App\Http\Livewire\Backend\LogoutContent;
use App\Http\Livewire\Backend\ProfileContent;
use App\Http\Livewire\Backend\VillageContent;
use App\Http\Livewire\Backend\DistrictContent;
use App\Http\Livewire\Backend\ProvinceContent;
use App\Http\Livewire\Backend\DashboardContent;
use App\Http\Livewire\Backend\Sales\SalesContent;
use App\Http\Livewire\Backend\Orders\ImportContent;
use App\Http\Livewire\Backend\Orders\OrdersContent;
use App\Http\Livewire\Backend\DataStore\UserContent;
use App\Http\Livewire\Backend\DataStore\ProductContent;
use App\Http\Livewire\Backend\Orders\OrdersCartContent;
use App\Http\Livewire\Backend\Orders\ImportUpdateContent;
use App\Http\Livewire\Backend\DataStore\ProductTypeContent;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// ========== Backend ====================================//
Route::get('/login-admin', LoginContent::class)->name('backend.login');

// ========== Front-end ========== //
// Route::middleware('auth.frontend')->group(function () {
//     Route::get('/logouts', [LogoutContent::class, 'logout'])->name('frontend.logout');
//     Route::get('/profiles/{id}', ProfileContent::class)->name('frontend.profile');
// });

Route::group(['middleware' => 'auth.backend'], function () {
    Route::get('/logout', [LogoutContent::class, 'logout'])->name('backend.logout');
    Route::get('/dashboard', DashboardContent::class)->name('backend.dashboard');
    Route::get('/admin-profiles', ProfileContent::class)->name('backend.profile');
    Route::get('/users', UserContent::class)->name('backend.user');
    Route::get('/roles', RolesContent::class)->name('backend.role');
    Route::get('/villages', VillageContent::class)->name('backend.village');
    Route::get('/districts', DistrictContent::class)->name('backend.district');
    Route::get('/provinces', ProvinceContent::class)->name('backend.province');
    Route::get('/abouts', AboutContent::class)->name('backend.about');
    Route::get('/slides', SlideContent::class)->name('backend.slide');

    Route::get('/product_types', ProductTypeContent::class)->name('backend.product_type');
    Route::get('/products', ProductContent::class)->name('backend.product');

    Route::get('/Orders', OrdersContent::class)->name('backend.order');
    Route::get('/OrderCarts', OrdersCartContent::class)->name('backend.OrderCart');
    Route::get('/OrderImports', ImportContent::class)->name('backend.OrderImport');
    Route::get('/imports-update/{slug_id}', ImportUpdateContent::class)->name('backend.import_update');
    Route::get('/Sales', SalesContent::class)->name('backend.sale');
    

});
