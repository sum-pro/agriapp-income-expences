<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IncomeExpenseController;
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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [IncomeExpenseController::class, 'getTransactions'])->name('home');
Route::post('/add-transaction', [IncomeExpenseController::class, 'addTransaction'])->name('add-transaction');
Route::delete('/del-transaction/{id}', [IncomeExpenseController::class, 'delTransaction']);
