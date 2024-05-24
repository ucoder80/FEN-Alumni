<?php

use App\Http\Livewire\Backend\AboutContent;
use App\Http\Livewire\Backend\DashboardContent;
use App\Http\Livewire\Backend\DataStore\DepartmentContent;
use App\Http\Livewire\Backend\DataStore\EducationSystemContent;
use App\Http\Livewire\Backend\DataStore\EducationYearContent;
use App\Http\Livewire\Backend\DataStore\OldStudentContent;
use App\Http\Livewire\Backend\DataStore\PositionContent;
use App\Http\Livewire\Backend\DataStore\ProductContent;
use App\Http\Livewire\Backend\DataStore\SalaryContent;
use App\Http\Livewire\Backend\DataStore\SubjectContent;
use App\Http\Livewire\Backend\DataStore\UserContent;
use App\Http\Livewire\Backend\DataStore\WorkPlaceContent;
use App\Http\Livewire\Backend\DistrictContent;
use App\Http\Livewire\Backend\IncomeExpendContent;
use App\Http\Livewire\Backend\LoginContent;
use App\Http\Livewire\Backend\LogoutContent;
use App\Http\Livewire\Backend\Orders\ImportContent;
use App\Http\Livewire\Backend\Orders\ImportUpdateContent;
use App\Http\Livewire\Backend\Orders\OrdersCartContent;
use App\Http\Livewire\Backend\Orders\OrdersContent;
use App\Http\Livewire\Backend\PaySalary\PaySalaryContent;
use App\Http\Livewire\Backend\ProfileContent;
use App\Http\Livewire\Backend\ProvinceContent;
use App\Http\Livewire\Backend\Reports\OrdersReportsContent;
use App\Http\Livewire\Backend\Reports\ProductsContent;
use App\Http\Livewire\Backend\Reports\ReportOldStudentContent;
use App\Http\Livewire\Backend\Reports\ReportPaySalaryContent;
use App\Http\Livewire\Backend\Reports\ReportUserContent;
use App\Http\Livewire\Backend\Reports\ReportWorkPlaceContent;
use App\Http\Livewire\Backend\Reports\SalesReportsContent;
use App\Http\Livewire\Backend\RolesContent;
use App\Http\Livewire\Backend\Sales\SalesContent;
use App\Http\Livewire\Backend\SlideContent;
use App\Http\Livewire\Backend\VillageContent;
use App\Http\Livewire\Frontend\AboutsContent;
use App\Http\Livewire\Frontend\ContactsContent;
use App\Http\Livewire\Frontend\HomeContent;
use App\Http\Livewire\Frontend\SearchContent;
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

// ========== Backend ====================================//
Route::get('/login-admin', LoginContent::class)->name('backend.login');
Route::get('/', HomeContent::class)->name('frontend.Home');
Route::get('Abouts', AboutsContent::class)->name('frontend.About');
Route::get('Contacts', ContactsContent::class)->name('frontend.Contact');
Route::get('Searchs', SearchContent::class)->name('frontend.Search');

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
    Route::get('/OldStudents', OldStudentContent::class)->name('backend.OldStudent');
    Route::get('/roles', RolesContent::class)->name('backend.role');
    Route::get('/villages', VillageContent::class)->name('backend.village');
    Route::get('/districts', DistrictContent::class)->name('backend.district');
    Route::get('/provinces', ProvinceContent::class)->name('backend.province');
    Route::get('/abouts', AboutContent::class)->name('backend.about');
    Route::get('/slides', SlideContent::class)->name('backend.slide');

    Route::get('/positions', PositionContent::class)->name('backend.position');
    Route::get('/salarys', SalaryContent::class)->name('backend.salary');
    Route::get('/products', ProductContent::class)->name('backend.product');

    Route::get('/Orders', OrdersContent::class)->name('backend.order');
    Route::get('/OrderCarts', OrdersCartContent::class)->name('backend.OrderCart');
    Route::get('/OrderImports', ImportContent::class)->name('backend.OrderImport');
    Route::get('/imports-update/{slug_id}', ImportUpdateContent::class)->name('backend.import_update');
    Route::get('/Sales', SalesContent::class)->name('backend.sale');

    Route::get('/SalesReports', SalesReportsContent::class)->name('backend.SalesReport');
    Route::get('/OrdersReports', OrdersReportsContent::class)->name('backend.OrdersReport');
    Route::get('/ProductsReports', ProductsContent::class)->name('backend.ProductsReport');
    Route::get('/IncomeExpendContents', IncomeExpendContent::class)->name('backend.IncomeExpendContent');
    Route::get('/ReportEmployee', ReportUserContent::class)->name('backend.ReportUser');

    Route::get('/PaySalarys', PaySalaryContent::class)->name('backend.PaySalary');
    Route::get('/ReportPaySalarys', ReportPaySalaryContent::class)->name('backend.ReportPaySalary');
    // ============ you ==============
    Route::get('/EducationSystems', EducationSystemContent::class)->name('backend.EducationSystem');
    Route::get('/Departments', DepartmentContent::class)->name('backend.Department');
    Route::get('/Subjects', SubjectContent::class)->name('backend.Subject');
    Route::get('/WorkPlaces', WorkPlaceContent::class)->name('backend.WorkPlace');
    Route::get('/EducationYears', EducationYearContent::class)->name('backend.EducationYear');

    Route::get('/ReportOldStudents', ReportOldStudentContent::class)->name('backend.ReportOldStudent');
    Route::get('/ReportWorkPlaces', ReportWorkPlaceContent::class)->name('backend.ReportWorkPlace');


});
