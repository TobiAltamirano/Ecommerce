<?php

use App\Http\Controllers\CartController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\App;
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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'service']);
    // ->middleware('auth');

Route::get('/news', [\App\Http\Controllers\NewsController::class, 'news']);
    // ->middleware('auth');

Route::get('/check/admin', [\App\Http\Controllers\AuthController::class, 'adminAccess'])
    ->middleware('auth')
    ->middleware('check.admin');

Route::get('/abm', [\App\Http\Controllers\NewsController::class, 'abm'])
    ->middleware('auth')
    ->middleware('check.admin');

// CRUD

Route::get('/abm/create', [\App\Http\Controllers\NewsController::class, 'createForm'])
    ->middleware('auth')
    ->middleware('check.admin');

Route::post('/abm/process', [\App\Http\Controllers\NewsController::class, 'createProcess'])
    ->middleware('auth')
    ->middleware('check.admin');

Route::post('/abm/delete/{id}', [\App\Http\Controllers\NewsController::class, 'deleteNotice'])
    ->middleware('auth')
    ->middleware('check.admin');

Route::get('/abm/delete/{id}/process', [\App\Http\Controllers\NewsController::class, 'deleteProcess'])
    ->middleware('auth')
    ->middleware('check.admin');

Route::get('/abm/edit/{id}', [\App\Http\Controllers\NewsController::class, 'editNotice'])
    ->middleware('auth')
    ->middleware('check.admin');

Route::post('/abm/update/{id}', [\App\Http\Controllers\NewsController::class, 'updateNotice'])
    ->middleware('auth')
    ->middleware('check.admin');

// Autenticación
Route::get('/iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'loginForm']);

Route::post('/iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'loginProcess']);

// Con POST no funcionaba. por eso se utiliza GET
Route::get('/cerrar-sesion', [\App\Http\Controllers\AuthController::class, 'logoutProcess']);

// Registro de usuario

Route::get('/register', [\App\Http\Controllers\AuthController::class, 'registerForm']);

Route::post('/register/process', [\App\Http\Controllers\AuthController::class, 'registerProcess']);

// Control de usuarios
Route::get('/abm/users', [\App\Http\Controllers\PurchaseController::class, 'usersList'])
    ->middleware('auth')
    ->middleware('check.admin');

Route::get('/abm/user/{id}/details', [\App\Http\Controllers\PurchaseController::class, 'userDetails'])
    ->middleware('auth')
    ->middleware('check.admin');

// Carrito de compras
Route::get('/cart', [\App\Http\Controllers\CartController::class, 'cart'])
    ->middleware('auth');

Route::post('/cart/add/{service_id}', [\App\Http\Controllers\CartController::class, 'addToCart'])
    ->middleware('auth');

Route::delete('/cart/remove/{cartItemId}', [\App\Http\Controllers\CartController::class, 'removeFromCart'])
    ->middleware('auth');

Route::delete('/cart/clear', [\App\Http\Controllers\CartController::class, 'clearCart'])
    ->middleware('auth');

// Perfil de usuario
Route::get('/profile', [\App\Http\Controllers\AuthController::class, 'showProfile'])
    ->middleware('auth');

Route::get('/profile/edit', [\App\Http\Controllers\AuthController::class, 'editProfile'])
    ->middleware('auth');

Route::patch('/profile/edit/update', [\App\Http\Controllers\AuthController::class, 'updateProfile'])
    ->middleware('auth');

// Compras del usuario
Route::get('/profile/purchases', [\App\Http\Controllers\PurchaseController::class, 'userPurchases'])
    ->middleware('auth');

// Mercado Pago
Route::get('/checkout', [\App\Http\Controllers\MercadoPagoController::class, 'showForm'])
    ->middleware('auth');

// Back URLs
Route::get('/checkout/success', [\App\Http\Controllers\MercadoPagoController::class, 'success'])
    ->middleware('auth')
    ->Name('mp.success');

Route::get('/checkout/pending', [\App\Http\Controllers\MercadoPagoController::class, 'pending'])
    ->middleware('auth')
    ->Name('mp.pending');

Route::get('/checkout/failure', [\App\Http\Controllers\MercadoPagoController::class, 'failure'])
    ->middleware('auth')
    ->Name('mp.failure');

Route::get('/checkout/process-purchase', [\App\Http\Controllers\MercadoPagoController::class, 'processPurchase'])
    ->middleware('auth')
    ->name('mp.processPurchase');

// Dashboard
Route::get('/abm/dashboard/services', [\App\Http\Controllers\DashboardController::class, 'showServices'])
    ->middleware('auth')
    ->name('abm.dashboardServices');

Route::get('/abm/dashboard/users', [\App\Http\Controllers\DashboardController::class, 'showUsers'])
    ->middleware('auth')
    ->name('abm.dashboardUsers');