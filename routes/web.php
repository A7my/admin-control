<?php

use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\AdminProductController;
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


//Routes for admin

Route::group(['middleware' => ['auth' , 'admin'] , 'prefix' => 'admin'] , function(){
    // Route::reso('/index' , [AdminProductController::class , 'index']);
    Route::resource('products', AdminProductController::class);

});

//Routes for user
Route::middleware(['auth'])->group(function () {
    Route::get('/index' , [ProductController::class , 'index']);
});

require __DIR__.'/auth.php';


