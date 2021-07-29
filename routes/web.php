<?php

use App\Http\Controllers\Agent\PaymentController;
use App\Http\Controllers\Agent\PortfolioController;
use App\Http\Controllers\Agent\ProposalController;
use App\Http\Controllers\HomeController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('proposals', [HomeController::class, 'proposals'])->name('proposals');
Route::get('/list', [HomeController::class, 'list'])->name('list');

Route::get('users', [HomeController::class, 'users'])->name('users');

Route::resource('portfolio', PortfolioController::class);
Route::resource('proposal', ProposalController::class);
Route::resource('payment', PaymentController::class);
//  Route::get('/password/email',[ResetController::class ,'sendResetLinkEmail']);