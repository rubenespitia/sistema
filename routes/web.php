<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClinicaController;
use App\Http\Controllers\VeterinarioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\EventoController;
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

Route::get('/welcome', function () {
    return view('welcome');
});



/* //Forma de recyrrir a la carpeta de vistas empleado en su archivo index 
Route::get('/empleado', function () {
    return view('empleado.index');
});

//Forma de recurrir a la carpeta de vistas en su archivo create
Route::get('/empleado/create', [EmpleadoController::class,'create']);
*/


//Forma de recurrir a la carpeta de vistas empleado con todas sus cosas
Route::resource('empleado', EmpleadoController::class)->middleware('auth');

//Quitamos el register y el reset del inicio
Auth::routes(['register'=>false, 'reset'=>false]);

Route::get('/home', [ClinicaController::class, 'index2'])->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/',[ClinicaController::class,'index2'])->name('home');
});


//Forma de recurrir a la carpeta de vistas empleado con todas sus cosas
Route::resource('clinica', ClinicaController::class)->middleware('auth');

Route::resource('veterinario', VeterinarioController::class)->middleware('auth');

Route::resource('cliente', ClienteController::class)->middleware('auth');

Route::resource('mascota', MascotaController::class)->middleware('auth');

//Route::resource('evento', EventoController::class)->middleware('auth');

//Post de los eventos
Route::post('/evento/agregar', [App\Http\Controllers\EventoController::class,'store']);

//Get para recibir los datos en json de la base de datos
Route::get('/evento/mostrar', [App\Http\Controllers\EventoController::class,'show']);

//Get para eventos
Route::get('/evento', [App\Http\Controllers\EventoController::class,'index']);

Route::post('/evento/editar/{id}', [App\Http\Controllers\EventoController::class,'edit']);

Route::post('/evento/borrar/{id}', [App\Http\Controllers\EventoController::class,'destroy']);

Route::post('/evento/actualizar/{evento}', [App\Http\Controllers\EventoController::class,'update']);