<?php

use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\SubsidiaryController;
use App\Http\Controllers\Admin\SuperAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BancoController;
use App\Http\Controllers\CaixaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FradeController;
use App\Http\Controllers\LancBancoController;
use App\Http\Controllers\StandardReleaseController;
use App\Http\Controllers\UserController;
use App\Models\LancBanco;
use App\Models\Subsidiary;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'AuthLogin']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('forgot-password', [AuthController::class, 'forgotpassword'])->name('forgot.password');
Route::post('forgot-password', [AuthController::class, 'PostForgotPassword'])->name('post.forgot.password');
Route::get('reset/{token}', [AuthController::class, 'reset'])->name('reset');
Route::post('reset/{token}', [AuthController::class, 'PostReset'])->name('reset.Post');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.index');
    Route::get('/admin/matriz/user/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/admin/matriz/user/list', [UserController::class, 'list'])->name('user.list');

    Route::get('/admin/matriz/standardRelease/create', [StandardReleaseController::class, 'create'])->name('standard.create');
    Route::get('/admin/matriz/standardRelease/list', [StandardReleaseController::class, 'list'])->name('standard.list');
    Route::post('/admin/matriz/standardRelease/', [StandardReleaseController::class, 'store'])->name('standard.store');

    Route::resource('Lbanco', [bancoController::class]);
});

Route::group(['middleware' => 'user'], function () {

    Route::delete('/user/caixa/{id}', [CaixaController::class, 'destroy'])->name('user.caixa.destroy');
    Route::put('/user/caixa/{id}', [CaixaController::class, 'update'])->name('user.caixa.update');
    Route::get('/user/caixa/{id}/edit', [CaixaController::class, 'edit'])->name('user.caixa.edit');
    Route::get('/user/caixa/list', [CaixaController::class, 'list'])->name('user.caixa.list');
    Route::post('/user/caixa', [CaixaController::class, 'store'])->name('user.caixa.store');
    Route::get('/user/caixa/index', [CaixaController::class, 'create'])->name('user.caixa.create');
    Route::get('/user/caixa', [CaixaController::class, 'index'])->name('user.caixa.index');

    Route::delete('/destroy-img/{id}', [CaixaController::class, 'fileDestroy'])->name('user.caixa.fileDestroy');

    Route::delete('/user/banco/{id}', [LancBancoController::class, 'destroy'])->name('user.banco.destroy');
    Route::put('/user/banco/{id}', [LancBancoController::class, 'update'])->name('user.banco.update');
    Route::get('/user/banco/{id}/edit', [LancBancoController::class, 'edit'])->name('user.banco.edit');
    Route::get('/user/bancos/list', [LancBancoController::class, 'list'])->name('user.banco.list');
    Route::post('user/bancos', [LancBancoController::class, 'store'])->name('user.banco.store');
    Route::get('/user/bancos/index', [LancBancoController::class, 'create'])->name('user.banco.create');
    Route::get('/user/bancos/', [LancBancoController::class, 'index'])->name('user.banco.index');

    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/user/{id}', [CompanyController::class, 'show'])->name('company.show');
    Route::get('/{id}', 'FileController@show');



    Route::post('upload-image-via-ajax', 'Controller@uploadImageViaAjax')->name('uploadImageViaAjax');
Route::post('store-image', 'Controller@store')->name('image.store');


});

Route::group(['middleware' => 'frade'], function () {

    Route::put('/frade/caixa/{id}', [CaixaController::class, 'update'])->name('caixa.update');
    Route::get('/frade/caixa/{id}/edit', [CaixaController::class, 'edit'])->name('caixa.edit');
    Route::get('/frade/caixa/list', [CaixaController::class, 'list'])->name('caixa.list');
    Route::post('/frade/caixa/index', [CaixaController::class, 'store'])->name('caixa.store');
    Route::get('/frade/caixa/index', [CaixaController::class, 'create'])->name('caixa.create');

    Route::get('/user/caixa/index', [CaixaController::class, 'index'])->name('caixa.index');

    Route::get('/frade/dashboard', [FradeController::class, 'index'])->name('frade.dashboard');
});


Route::group(['middleware' => 'superadmin'], function () {
    Route::get('/superadmin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::delete('/admin/matriz/comapny/{id}', [CompanyController::class, 'destroy'])->name('company.destroy');
    Route::get('/admin/matriz/company/{id}/edit', [CompanyController::class, 'edit'])->name('company.edit');
    Route::put('/admin/matriz/comapny/{id}', [CompanyController::class, 'update'])->name('company.update');
    Route::get('/admin/matriz/company/create', [CompanyController::class, 'create'])->name('company.create');
    Route::post('/admin/matriz/company/', [CompanyController::class, 'store'])->name('company.store');
    Route::get('/admin/matriz/company/', [CompanyController::class, 'index'])->name('company.index');

    Route::resource('superadmin', AdminController::class);

    Route::resource('subsidiary', SubsidiaryController::class);
}) ;
