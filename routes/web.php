<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
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

Route::get('importExportView', [Controller::class, 'importExportView']);
Route::get('export', [Controller::class, 'export'])->name('export');
Route::post('import', [Controller::class, 'import'])->name('import');
Route::post('add', [Controller::class, 'store'])->name('add');