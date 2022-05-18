<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinksController;
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

Route::get('/', [LinksController::class, 'show'])->name('links.show');
Route::post('/', [LinksController::class, 'send'])->name('links.send');
Route::get('/{key}', [LinksController::class, 'redirect'])->where('key', '\w+')->name('links.redirect');
