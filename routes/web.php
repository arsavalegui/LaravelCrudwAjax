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
    return view('auth.login');
});

/*Route::get('/empleado', function () { //<- ruta de acceso
    return view('empleado.index'); //<- ruta a la que accede
});

Route::get('/empleado/create',[EmpleadoController::class,'create']); // /ruta,clase::class,'metodo al cual se accede'*/

Route::resource('empleado', EmpleadoController::class); // acceder a todas las url y trabajar mas comodamente con los metodos de empleado controller

Auth::routes();

Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [EmpleadoController::class, 'index'])->name('home');
});

