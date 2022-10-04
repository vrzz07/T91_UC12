<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JogosController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::prefix('jogo')
    ->middleware(['auth'])
    ->controller(JogosController::class)
    ->group(function (){
        Route::get('/index', 'index')->name('jogo.index');
        Route::get('/novo', 'create')->name('jogo.create');
        Route::get('/editar/{id}', 'edit')->name('jogo.edit');
        Route::get('/mostrar/{id}', 'show')->name('jogo.show');
        Route::post('/cadastrar', 'store')->name('jogo.store');
        Route::post('/atualizar/{id}', 'update')->name('jogo.update');
        Route::post('/deletar/{id}', 'destroy')->name('jogo.destroy');
});
