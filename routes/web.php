<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GolonganController;
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

// reference the Dompdf namespace
use Dompdf\Dompdf;

Route::get('/slip_gaji/pdf', function (){

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml(view('pages.slip_gaji'));

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('demo.pdf', ['Attachment'=>false]);
});

Route::get('/', [App\Http\Controllers\PagesController::class, 'welcome']);

Route::get('/index', [App\Http\Controllers\PagesController::class, 'index']);

Route::get('/search', [App\Http\Controllers\EmployeesController::class, 'search']);

Route::get('employees/sekre', [App\Http\Controllers\EmployeesController::class, 'employees_sekre']);
Route::get('employees/tk', [App\Http\Controllers\EmployeesController::class, 'employees_tk']);
Route::get('employees/sd', [App\Http\Controllers\EmployeesController::class, 'employees_sd']);
Route::get('employees/smp', [App\Http\Controllers\EmployeesController::class, 'employees_smp']);
Route::get('employees/sma', [App\Http\Controllers\EmployeesController::class, 'employees_sma']);

Route::resource('employees', 'EmployeesController');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);

Route::get('/slip_gaji', [App\Http\Controllers\PagesController::class, 'slip_gaji']);

Route::resource('salary_groups', 'SalaryGroupController');
Route::resource('salary', 'SalaryController');
Route::resource('analyst', 'AnalystController');
Route::resource('score', 'ScoreController');