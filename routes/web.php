<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Frontsite\PaymentController;
use App\Http\Controllers\Frontsite\TicketController;
use Faker\Provider\ar_EG\Payment;

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
route::group([ 'middleware' => ['auth:sanctum', 'verified']],
function(){
    //return view('dashboard');

    // appointment page
    route::get('/ticket/{id}', [TicketController::class, 'ticket'])->name('ticket');
    route::resource('/ticket', TicketController::class);

    //Payment page
    route::resource('payment', PaymentController::class);
});

route::group(['prefix' => 'backsite', 'as' => 'backsite', 'middleware' => ['auth:sanctum', 'verified']],
function(){

    return view('dashboard');


});

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
