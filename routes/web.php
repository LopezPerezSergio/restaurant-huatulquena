<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\RolController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\SaleController;
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
    Route::get('dashboard', DashboardController::class)->name('dashboard');

    Route::resource('roles', RolController::class)->names('roles');
    Route::resource('employees', EmployeeController::class)->names('employees');

    Route::resource('categories', CategoryController::class)->names('categories');
    Route::resource('products', ProductController::class)->names('products');

    Route::resource('users', UsersController::class)->names('users');

    Route::resource('pdf', TicketController::class)->names('pdf');
    //ruta que muestra un ejemplo de pdf 
    Route::get('imprimir', [TicketController::class, 'pdf'])->name('pdf.imprimir');
    //ruta que muestra el ticket para el pedido inicial
    Route::get('pdfInicial', [TicketController::class, 'generateTicket'])->name('pdfInicial');
    //ruta que muestra el ticket para el pedido final
    Route::get('pdfFinal', [TicketController::class, 'generateTicketFinal'])->name('pdfFinal');
    Route::resource('sales', SaleController::class)->names('sales');
    //ruta que muestra el ticket para el pedido final
    Route::get('reporte', [SaleController::class, 'generarReporte'])->name('reporte');

});
