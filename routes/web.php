<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Backend\LoginContent;
use App\Http\Livewire\Backend\RolesContent;
use App\Http\Livewire\Backend\LogoutContent;
use App\Http\Livewire\Backend\ProfileContent;
use App\Http\Livewire\Backend\VillageContent;
use App\Http\Livewire\Backend\DistrictContent;
use App\Http\Livewire\Backend\ProvinceContent;
use App\Http\Livewire\Backend\DashboardContent;
use App\Http\Livewire\Backend\DataStore\UserContent;

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
});
