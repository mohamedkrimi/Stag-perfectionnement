<?php

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

Route::get('/admin', function () {
    return view('admin.users.index');
});

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/contact', function () {
    return view('contact');
});
// Route::get('/reservation', function () {
//     return view('order');
// });
Route::get('reservation', [App\Http\Controllers\ReservationController::class,'index'])->name('reservationget');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();
Route::post('loginReserve', [App\Http\Controllers\Auth\LoginController::class,'loginReserve'])->name('loginReserve');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/offres', [App\Http\Controllers\HomeController::class, 'offres'])->name('offres');
Route::get('/filter/{id}', [App\Http\Controllers\HomeController::class, 'filter'])->name('filter');
Route::post('contact', [App\Http\Controllers\Admin\ContactController::class,'store'])->name('storeContact');
Route::get('reserve/{id}', [App\Http\Controllers\HomeController::class,'reserverDetaile'])->name('reserverDetaile');
Route::post('reservation', [App\Http\Controllers\ReservationController::class,'store'])->name('reservation');

// les routes admins
Route::group(['middleware' => ['auth','isAdmin'],'prefix' => 'dashboard'], function () {
    Route::resource('categories', 'App\Http\Controllers\Admin\CategoriesController');
    Route::resource('produits', 'App\Http\Controllers\Admin\ProduitsController');

    Route::resource('contact', 'App\Http\Controllers\Admin\ContactController');
    // Route::resource('manufactured', 'App\Http\Controllers\Admin\ManufacturedGoodsController');
    // Route::resource('status', 'App\Http\Controllers\Admin\StatusController');
    // Route::resource('offres', 'App\Http\Controllers\Admin\OffreController');
    // Route::resource('commandes', 'App\Http\Controllers\Admin\CommandesController');
    Route::get('reservations', [App\Http\Controllers\ReservationController::class,'index1'])->name('reservations');
    Route::resource('users-admin', 'App\Http\Controllers\Admin\UsersController');
    // Route::post('/active', [App\Http\Controllers\Admin\UsersController::class, 'active']);
    // Route::post('/blocked',[App\Http\Controllers\Admin\UsersController::class, 'blocked']);
    // Route::post('/updatePasword', [App\Http\Controllers\Admin\UsersController::class, 'updatePasswordUser']);
});
