<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;

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

Route::get('/', function () {
    return view('hello');
});


Route::get('/user/list', [UserController::class, 'userData']);


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin URLs
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/hrPage', [DashboardController::class, 'hrFunction'] );

    //Users
    // Route::get('/users', [UserController::class, 'index'] );
    // Route::get('view-user/{user_id}', [UserController::class, 'view']);
    // Route::get('add-user', [UserController::class, 'create'] );
    // Route::post('add-user', [UserController::class, 'store'] );


        Route::get('/users', [UserController::class, 'index'] );
        Route::get('/user/create', [UserController::class, 'create']);
        Route::post('/add', [UserController::class, 'store'])->name('user.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/delete/{user_id}', [UserController::class, 'destroy']);
        Route::get('view-user/{user_id}', [UserController::class, 'view']);
    


    //Profile
    Route::get('/profile', [DashboardController::class, 'profile'] );
    

});

//HR URLs
Route::prefix('hr')->middleware(['auth', 'isHr'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\Hr\DashboardController::class, 'index']);

    //Profile
    Route::get('/profile', [DashboardController::class, 'profile'] );

    Route::get('/hrPage', [DashboardController::class, 'hrFunction'] );
});

//User URLs
Route::prefix('user')->middleware(['auth', 'isUser'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\User\DashboardController::class, 'index']);

    //Profile
    Route::get('/profile', [DashboardController::class, 'profile'] );
});


