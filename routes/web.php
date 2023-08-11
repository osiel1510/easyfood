<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SeccionController;
use App\Http\Controllers\SectionOptionController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\MenuController;


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

Route::get('/demo', function () {
    return view('demo');
});

Route::get('/planes', function () {
    return view('planes');
});

Route::get('/welcome', function () {
    return view('welcome');
})->name('index');

Route::get('/secciones', [SeccionController::class,'index'])->name('secciones.index');

Route::post('/secciones', [SeccionController::class,'store'])->name('secciones.store');

Route::post('/secciones/editar/{id}', 'NombreDeTuControlador@update')->name('secciones.update');

Route::delete('/secciones/{seccion}', [SeccionController::class,'destroy'])->name('secciones.destroy');

Route::post('/imagenes', [ImageController::class,'store'])->name('imagenes.store');

Route::get('/registrar', [RegisterController::class,'index'])->name('registrar-cuenta');

Route::post('/registrar', [RegisterController::class,'store']);

Route::get('/muro',[PostController::class,'index'])->name('post.index');

Route::get('/',[PostController::class,'index'])->name('post.index');

Route::patch('/',[PostController::class,'update'])->name('post.update');

Route::get('/login',[LoginController::class,'index'])->name('login');

Route::post('/login',[LoginController::class,'store']);

Route::post('/logout',[LogoutController::class,'store'])->name('logout');

Route::get('/products', [ProductoController::class, 'index'])->name('products.index');
Route::post('/products', [ProductoController::class, 'store'])->name('products.store');
Route::delete('/products/{id}', [ProductoController::class, 'destroy'])->name('products.destroy');
Route::get('/products/{id}', [ProductoController::class, 'show'])->name('products.show');

Route::get('/section-options', [SectionOptionController::class, 'index'])->name('section_options.index');
Route::post('/section-options', [SectionOptionController::class, 'store'])->name('section_options.store');
Route::delete('/section-options/{section_option}', [SectionOptionController::class, 'destroy'])->name('section_options.destroy');

Route::get('/options', [OptionController::class, 'index'])->name('options.index');
Route::post('/options', [OptionController::class, 'store'])->name('options.store');
Route::delete('/options/{option}', [OptionController::class, 'destroy'])->name('options.destroy');

Route::get('menu/{restaurant}', [MenuController::class, 'showMenu'])->name('menu.show');
