<?php

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



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard_old', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard_old');

Route::group(['prefix' => 'dashboard'], function () {

    Route::resource('stocks', 'App\Http\Controllers\Admin\StockController', ['names' => 'dashboard.stock']);
    Route::resource('stocks-out', 'App\Http\Controllers\Admin\StockOutController', ['names' => 'dashboard.stock.out']);
    Route::get('/', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::resource('roles', 'App\Http\Controllers\RolesController', ['names' => 'dashboard.roles']);
    Route::resource('admins', 'App\Http\Controllers\AdminsController', ['names' => 'dashboard.admins']);
    Route::resource('employees', 'App\Http\Controllers\CAS\EmployeesController', ['names' => 'dashboard.employees']);
    Route::resource('expenses-salary', 'App\Http\Controllers\Admin\SalaryController', ['names' => 'dashboard.expense.salary']);
    Route::resource('expenses-other', 'App\Http\Controllers\Admin\ExpenseController', ['names' => 'dashboard.expense.other']);
    Route::resource('scategorys', 'App\Http\Controllers\Admin\sCategoryController', ['names' => 'dashboard.sale.category']);
    Route::resource('pcategorys', 'App\Http\Controllers\Admin\pCategoryController', ['names' => 'dashboard.purchase.category']);
    Route::resource('pitems', 'App\Http\Controllers\Admin\PurchaseItemController', ['names' => 'dashboard.purchase.item']);
    Route::resource('punits', 'App\Http\Controllers\Admin\PurchaseUnitController', ['names' => 'dashboard.purchase.unit']);
    Route::resource('saleitem', 'App\Http\Controllers\Admin\SaleItemController', ['names' => 'dashboard.sale.item']);
    Route::resource('saleunit', 'App\Http\Controllers\Admin\SaleUnitController', ['names' => 'dashboard.sale.unit']);
    Route::resource('sales', 'App\Http\Controllers\Admin\SaleController', ['names' => 'dashboard.sales']);
    Route::resource('sales-production', 'App\Http\Controllers\Admin\ProductionController', ['names' => 'dashboard.sales.production']);
    Route::resource('purchases', 'App\Http\Controllers\Admin\PurchaseController', ['names' => 'dashboard.purchases']);
    //Report Controller
    Route::resource('sales-report', 'App\Http\Controllers\Admin\SaleReportController', ['names' => 'dashboard.reports.sales']);
    Route::post('reports-sale', 'App\Http\Controllers\Admin\SaleReportController@DateRange')->name('dashboard.reports.sale.date-range');
    Route::resource('productions-report', 'App\Http\Controllers\Admin\ProductionReportController', ['names' => 'dashboard.reports.production']);
    Route::post('reports-productions', 'App\Http\Controllers\Admin\ProductionReportController@DateRange')->name('dashboard.reports.production.date-range');
    Route::resource('salary-report', 'App\Http\Controllers\Admin\SalaryReportController', ['names' => 'dashboard.reports.salary']);
    Route::post('reports-salary', 'App\Http\Controllers\Admin\SalaryReportController@DateRange')->name('dashboard.reports.salary.date-range');
    Route::resource('expense-report', 'App\Http\Controllers\Admin\ExpenseReportController', ['names' => 'dashboard.reports.expense']);
    Route::post('reports-expense', 'App\Http\Controllers\Admin\ExpenseReportController@DateRange')->name('dashboard.reports.expense.date-range');
    Route::resource('purchase-report', 'App\Http\Controllers\Admin\PurchaseReportController', ['names' => 'dashboard.reports.purchase']);
    Route::post('reports-purchase', 'App\Http\Controllers\Admin\PurchaseReportController@DateRange')->name('dashboard.reports.purchase.date-range');

    Route::post('category-product',[\App\Http\Controllers\Admin\SaleController::class,'findProduct'])->name('getcategory');
    Route::post('pcategory-product',[\App\Http\Controllers\Admin\PurchaseController::class,'findProduct'])->name('getpcategory');
    Route::post('product-list',[\App\Http\Controllers\Admin\SaleController::class,'findProductList'])->name('getproduct');
    Route::post('pproduct-list',[\App\Http\Controllers\Admin\PurchaseController::class,'findProductList'])->name('getpproduct');
    Route::post('salary-list',[\App\Http\Controllers\Admin\SalaryController::class,'findSalary'])->name('getsalary');
    Route::get('/employee-status/{id}',[\App\Http\Controllers\CAS\EmployeesController::class,'employeeStatus']);
    Route::get('user-profile',[\App\Http\Controllers\Admin\ProfileController::class,'index'])->name('user.profile');




    Route::get('/login', 'App\Http\Controllers\AdminAuth\AuthenticatedSessionController@showLoginForm')->name('dashboard.login');
    Route::post('/login/submit', 'App\Http\Controllers\AdminAuth\AuthenticatedSessionController@login')->name('dashboard.login.submit');

    Route::post('/logout/submit', 'App\Http\Controllers\AdminAuth\AuthenticatedSessionController@logout')->name('dashboard.logout.submit');
    Route::get('/employee-status/{id}',[\App\Http\Controllers\CAS\EmployeesController::class,'employeeStatus']);
    // Route::get('/password/reset', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('dashboard.login');
    // Route::post('/login/submit', 'App\Http\Controllers\Auth\LoginController@login')->name('dashboard.login.submit');
});

require __DIR__ . '/auth.php';
