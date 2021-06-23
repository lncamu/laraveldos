<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;

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

// Route::get('/empleados', function () {
//     return view('empleados.index');
// });

// crear una ruta para acceder a create o a la creación
            // Route::get('/empleados/create',[EmpleadoController::class,'create']);

//crear una ruta para llamar al modelo empleado o a todas las url y trabajar con todos los metodos
Route::resource('empleados',EmpleadoController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
