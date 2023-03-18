<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\VoucherController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// users
Route::resource('users', UserController::class);
Route::resource('academic-years', AcademicYearController::class);
Route::resource('classes', ClassController::class);
Route::resource('sections', SectionController::class);
Route::resource('schools', SchoolController::class);
Route::resource('students', StudentController::class);
Route::resource('profiles', ProfileController::class);
Route::resource('vouchers', VoucherController::class);
Route::get('vouchers/{voucher}/download', [VoucherController::class, 'downloadVoucher'])->name('vouchers.download');
Route::resource('expenses', ExpenseController::class);
Route::post('students/import', [StudentController::class, 'import'])->name('students.import');
Route::resource('teachers', TeacherController::class);
Route::post('teachers/import', [TeacherController::class, 'import'])->name('teachers.import');

Route::controller(SettingController::class)->prefix('settings')->name('settings.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/', 'show')->name('show');
    Route::get('/edit', 'edit')->name('edit');
    Route::put('/{industry}', 'update')->name('update');
});
