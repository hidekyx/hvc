<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\CollectionController as DashboardCollectionController;
use App\Http\Controllers\Dashboard\CourierSettingController;
use App\Http\Controllers\Dashboard\HistoryController as DashboardHistoryController;
use App\Http\Controllers\Dashboard\PageSettingController;
use App\Http\Controllers\Dashboard\PaymentSettingController;
use App\Http\Controllers\Dashboard\QuizController;
use App\Http\Controllers\Dashboard\ReviewController;
use App\Http\Controllers\Dashboard\TransactionController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\LandingPage\AuthController;
use App\Http\Controllers\LandingPage\CollectionController;
use App\Http\Controllers\LandingPage\HistoryController;
use App\Http\Controllers\LandingPage\HomeController;
use App\Http\Controllers\LandingPage\ProfileController;
use App\Http\Controllers\LandingPage\ShopController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/our-collection/national', [CollectionController::class, 'national']);
Route::get('/our-collection/international', [CollectionController::class, 'international']);

Route::get('/history/{category}', [HistoryController::class, 'grid']);
Route::get('/history/{category}/detail/{idHistory}', [HistoryController::class, 'detail']);
Route::get('/quiz/{idHistory}', [HistoryController::class, 'quiz']);

Route::get('/profile', [ProfileController::class, 'index']);
Route::post('/profile-update/{idUser}', [ProfileController::class, 'profileUpdate']);

Route::get('/shop/{idCollection}', [ShopController::class, 'detail']);
Route::get('/cart', [ShopController::class, 'cart']);
Route::post('/add-to-cart/{idCollection}', [ShopController::class, 'addToCart']);
Route::get('/cancel/{idCart}', [ShopController::class, 'cancelCartItem']);
Route::post('/checkout', [ShopController::class, 'checkout']);
Route::get('/transaction', [ShopController::class, 'transaction']);
Route::get('/payment/{idTransaction}', [ShopController::class, 'payment']);
Route::post('/payment-action/{idTransaction}', [ShopController::class, 'paymentAction']);
Route::get('/confirm-action/{idTransaction}', [ShopController::class, 'confirmAction']);
Route::get('/review/{idTransactionDetail}', [ShopController::class, 'review']);
Route::post('/review-action/{idTransactionDetail}', [ShopController::class, 'reviewAction']);

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login-action', [AuthController::class, 'loginAction']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register-action', [AuthController::class, 'registerAction']);

Route::get('/dashboard', [AdminController::class, 'index']);

Route::get('/dashboard/users', [UserController::class, 'index']);
Route::get('/dashboard/users/create', [UserController::class, 'create']);
Route::post('/dashboard/users/store', [UserController::class, 'store']);
Route::get('/dashboard/users/password/{idUser}', [UserController::class, 'password']);
Route::post('/dashboard/users/password-change/{idUser}', [UserController::class, 'passwordAction']);
Route::get('/dashboard/users/edit/{idUser}', [UserController::class, 'edit']);
Route::post('/dashboard/users/update/{idUser}', [UserController::class, 'update']);
Route::post('/dashboard/users/delete/{idUser}', [UserController::class, 'delete']);

Route::get('/dashboard/collections', [DashboardCollectionController::class, 'index']);
Route::get('/dashboard/collections/create', [DashboardCollectionController::class, 'create']);
Route::post('/dashboard/collections/store', [DashboardCollectionController::class, 'store']);
Route::get('/dashboard/collections/edit/{idCollection}', [DashboardCollectionController::class, 'edit']);
Route::post('/dashboard/collections/update/{idCollection}', [DashboardCollectionController::class, 'update']);
Route::post('/dashboard/collections/delete/{idCollection}', [DashboardCollectionController::class, 'delete']);

Route::get('/dashboard/histories', [DashboardHistoryController::class, 'index']);
Route::get('/dashboard/histories/create', [DashboardHistoryController::class, 'create']);
Route::post('/dashboard/histories/store', [DashboardHistoryController::class, 'store']);
Route::get('/dashboard/histories/edit/{idHistory}', [DashboardHistoryController::class, 'edit']);
Route::post('/dashboard/histories/update/{idHistory}', [DashboardHistoryController::class, 'update']);
Route::post('/dashboard/histories/delete/{idHistory}', [DashboardHistoryController::class, 'delete']);

Route::get('/dashboard/histories/quiz/{idHistory}', [QuizController::class, 'index']);
Route::get('/dashboard/histories/quiz/{idHistory}/create', [QuizController::class, 'create']);
Route::post('/dashboard/histories/quiz/{idHistory}/store', [QuizController::class, 'store']);
Route::get('/dashboard/histories/quiz/{idHistory}/edit/{idQuizQuestion}', [QuizController::class, 'edit']);
Route::post('/dashboard/histories/quiz/{idHistory}/update/{idQuizQuestion}', [QuizController::class, 'update']);
Route::post('/dashboard/histories/quiz/{idHistory}/delete/{idQuizQuestion}', [QuizController::class, 'delete']);

Route::get('/dashboard/transactions', [TransactionController::class, 'index']);
Route::get('/dashboard/transactions/deliver/{idTransaction}', [TransactionController::class, 'deliver']);

Route::get('/dashboard/reviews', [ReviewController::class, 'index']);

Route::get('/dashboard/payment-setting', [PaymentSettingController::class, 'index']);
Route::get('/dashboard/payment-setting/create', [PaymentSettingController::class, 'create']);
Route::post('/dashboard/payment-setting/store', [PaymentSettingController::class, 'store']);
Route::get('/dashboard/payment-setting/edit/{idPayment}', [PaymentSettingController::class, 'edit']);
Route::post('/dashboard/payment-setting/update/{idPayment}', [PaymentSettingController::class, 'update']);
Route::post('/dashboard/payment-setting/delete/{idPayment}', [PaymentSettingController::class, 'delete']);

Route::get('/dashboard/courier-setting', [CourierSettingController::class, 'index']);
Route::get('/dashboard/courier-setting/create', [CourierSettingController::class, 'create']);
Route::post('/dashboard/courier-setting/store', [CourierSettingController::class, 'store']);
Route::get('/dashboard/courier-setting/edit/{idCourier}', [CourierSettingController::class, 'edit']);
Route::post('/dashboard/courier-setting/update/{idCourier}', [CourierSettingController::class, 'update']);
Route::post('/dashboard/courier-setting/delete/{idCourier}', [CourierSettingController::class, 'delete']);

Route::get('/dashboard/page-setting', [PageSettingController::class, 'index']);
Route::get('/dashboard/page-setting/edit/{key}', [PageSettingController::class, 'edit']);
Route::post('/dashboard/page-setting/update/{key}', [PageSettingController::class, 'update']);