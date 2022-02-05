<?php

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
    return redirect('login/');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('is_client');
Route::get('support/home', [App\Http\Controllers\HomeController::class, 'support'])->name('support.home')->middleware('is_admin');

Route::get('client/ticket', [App\Http\Controllers\TicketController::class, 'index'])->name('client.ticket')->middleware('is_client');
Route::get('client/ticket/new', [App\Http\Controllers\TicketController::class, 'create'])->name('client.ticket.add')->middleware('is_client');
Route::post('client/ticket/new', [App\Http\Controllers\TicketController::class, 'store'])->name('client.ticket.store')->middleware('is_client');
Route::get('client/ticket/{id?}', [App\Http\Controllers\TicketController::class, 'show'])->name('client.ticket.show')->middleware('is_client');
Route::delete('client/ticket/{id?}', [App\Http\Controllers\TicketController::class, 'delete'])->name('client.ticket.delete')->middleware('is_client');

Route::get('support/ticket',[App\Http\Controllers\TicketController::class, 'list'])->name('support.ticket')->middleware('is_admin');