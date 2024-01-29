<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Backend\LoginContent;
use App\Http\Livewire\Backend\LogoutContent;
use App\Http\Livewire\Backend\ProfileContent;
use App\Http\Livewire\Backend\DashboardContent;
use App\Http\Livewire\Backend\DataStore\UserContent;
use App\Http\Livewire\Backend\RolesContent;

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

Route::group(['middleware' => 'auth.backend:admin'], function () {
    Route::get('/logout', [LogoutContent::class, 'logout'])->name('backend.logout');
    Route::get('/dashboard', DashboardContent::class)->name('backend.dashboard');
    Route::get('/admin-profiles', ProfileContent::class)->name('backend.profile');
    Route::get('/users', UserContent::class)->name('backend.user');
    Route::get('/roles', RolesContent::class)->name('backend.role');
});
