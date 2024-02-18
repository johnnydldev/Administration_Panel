<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\Controllers\Middleware;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('usuarios', UserController::class);
    Route::resource('roles', RolController::class);
    // Route::resource('secciones', SectionController::class);
    //Route::resource('archivos', FileController::class);
    Route::get('/user/profile', [UserController::class, 'showProfile'])->name('profile.show');
    Route::patch('/user/update/password/{id}', [UserController::class, 'updateUserPassword'])->name('update.userPassword');
    Route::patch('/user/update/profile/{id}', [UserController::class, 'updateUserProfile'])->name('update.userProfile');

    Route::get('/section/all', [SectionController::class, 'AllSec'])->name('all.section');

    Route::post('/section/add', [SectionController::class, 'AddSec'])->name('store.section');

    Route::get('/section/edit/{id}', [SectionController::class, 'Edit']);
    Route::post('/section/update/{id}', [SectionController::class, 'Update']);
    Route::get('/softdelete/section/{id}', [SectionController::class, 'SoftDelete']);

    Route::get('/section/restore/{id}', [SectionController::class, 'Restore']);
    Route::get('/pdelete/section/{id}', [SectionController::class, 'Pdelete']);
    Route::get('/section/create', [SectionController::class, 'create'])->name('secciones.ceate');

    /// Archivos route
    Route::get('/file/all', [FileController::class, 'AllFiles'])->name('all.files');
    Route::post('/file/add', [FileController::class, 'StoreFiles'])->name('store.files');
    Route::get('/file/edit/{id}', [FileController::class, 'Edit']);
    Route::post('/file/update/{id}', [FileController::class, 'Update']);
    Route::get('/file/delete/{id}', [FileController::class, 'Delete']);
    
    Route::get('/file/create', [FileController::class, 'create'])->name('archivos.ceate');
});
