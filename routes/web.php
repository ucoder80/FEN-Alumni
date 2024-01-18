<?php

use App\Http\Livewire\Backend\DashboardContent;
use App\Http\Livewire\Backend\LoginContent;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// ========== Backend ==========//
Route::get('/login-admin', LoginContent::class)->name('backend.login');

Route::get('/', DashboardContent::class)->name('backend.login');