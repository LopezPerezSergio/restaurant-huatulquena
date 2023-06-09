<?php

use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\RolController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

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

/* Ruta de la pagina welcome */

Route::get('/', WelcomeController::class);

/* Rutas de logueo */
Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('auth.login')/* ->middleware('Prevent.authenticated') */;
    Route::post('authenticate', [AuthController::class, 'authenticate'])->name('auth.authenticate');
});



/* Rutas del administrador */
Route::middleware('AuthApi')->prefix('admin')->group(function () {
    // Esta ruta solo puede ser accedida por usuarios autenticados
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('roles', RolController::class)->names('roles');
    Route::resource('employees', EmployeeController::class)->names('employees');
});
