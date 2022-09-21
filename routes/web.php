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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contatos', [App\Http\Controllers\AgendaContatosController::class, 'index'])->name('contatos.index');
Route::get('/contatos-criar', [App\Http\Controllers\AgendaContatosController::class, 'create'])->name('contatos.create');
Route::post('/contatos-criar', [App\Http\Controllers\AgendaContatosController::class, 'store'])->name('contatos.store');
Route::get('/contatos-editar/{id}', [App\Http\Controllers\AgendaContatosController::class, 'edit'])->name('contatos.edit');
Route::put('/contatos-editar/{id}', [App\Http\Controllers\AgendaContatosController::class, 'update'])->name('contatos.update');
Route::get('/contatos-deletar/{id}', [App\Http\Controllers\AgendaContatosController::class, 'delete'])->name('contatos.delete');
Route::post('/contatos-email', [App\Http\Controllers\AgendaContatosController::class, 'sendEmail'])->name('contatos.sendEmail');
Route::get('/contatos-email/{id}', [App\Http\Controllers\AgendaContatosController::class, 'showSendEmail'])->name('contatos.showSendEmail');
