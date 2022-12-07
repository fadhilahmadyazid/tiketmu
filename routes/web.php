<?php

use Illuminate\Support\Facades\Route;

//Frontsite
use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Frontsite\PaymentController;
use App\Http\Controllers\Frontsite\TicketController;
use App\Http\Controllers\Frontsite\RegisterController;

//Backsite
use App\Http\Controllers\Backsite\DashboardController;
use App\Http\Controllers\Backsite\PermissionController;
use App\Http\Controllers\Backsite\RoleController;
use App\Http\Controllers\Backsite\UserController;
use App\Http\Controllers\Backsite\TypeUserController;
use App\Http\Controllers\Backsite\ConfigPaymentController;
use App\Http\Controllers\Backsite\JenisTiketController;
use App\Http\Controllers\Backsite\EventController;
use App\Http\Controllers\Backsite\ReportTicketController;
use App\Http\Controllers\Backsite\ReportTransactionController;




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

route::resource('/',LandingController::class);
route::group([ 'middleware' => ['auth:sanctum', 'verified']], function()
    {
    // ticket page
    route::get('ticket/event/{id}', [TicketController::class, 'ticket'])->name('ticket.event');
    route::resource('ticket', TicketController::class);

    //Payment page
    Route::controller(PaymentController::class)->group(function() {
        Route::get('payment/success', 'success')->name('payment.success');
        Route::get('payment/ticket/{id}', 'payment')->name('payment.ticket');
        Route::post('payment/callback', 'callback')->name('payment.callback');
    });
    Route::resource('payment', PaymentController::class);

    Route::resource('register_success', RegisterController::class);
    }
);

    //Backsite
Route::group(['prefix' => 'backsite', 'as' => 'backsite.', 'middleware' => ['auth:sanctum', 'verified']], function () {
    //dashboard page
    Route::resource('dashboard', DashboardController::class);

    // permission
    Route::resource('permission', PermissionController::class);

    // role
    Route::resource('role', RoleController::class);

    // user
    Route::resource('user', UserController::class);

    // type user
    Route::resource('type_user', TypeUserController::class);

    // config payment
    Route::resource('config_payment', ConfigPaymentController::class);

    // jenis tiket
    Route::resource('jenistiket', JenisTiketController::class);

    // event
    Route::resource('event', EventController::class);

    // report ticket
    Route::resource('ticket', ReportTicketController::class);

    // report transaction
    Route::resource('transaction', ReportTransactionController::class);
    }
);

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
