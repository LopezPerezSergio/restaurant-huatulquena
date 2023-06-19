<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\RolController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\ReporteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| La ruta principal sera el login se elimino la ruta welcome 
| routes are loaded by the RouteServiceProvider and all of them will
|
*/

/* Ruta de la pagina welcome */

// Route::get('/', WelcomeController::class);
Route::get('/', function () {
    return view('auth.index');
});

/* Rutas de logueo */
Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('auth.login')/* ->middleware('Prevent.authenticated') */;
    Route::post('authenticate', [AuthController::class, 'authenticate'])->name('auth.authenticate');
    Route::post('logout', [AuthController::class, 'Desconectarse'])->name('logout');
    
    

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

    Route::resource('salesReporte', ReporteController::class)->names('salesReporte');
    //ruta que muestra el reporte de ventas
    Route::get('reporte', [ReporteController::class, 'generarReporte'])->name('reporte');
    //para corte del dia 
    Route::get('/generar-pdf', [ReporteController::class, 'generarPDF'])->name('reporteCaja');

    Route::resource('tables', TableController::class)->names('tables');
    Route::resource('orders', OrderController::class)->names('orders');

    Route::resource('nominas', PaymentController::class)->names('nominas');

    // Route::resource('sales', SaleController::class)->names('sales');
    //Rutas para los tickets
    Route::get('ticket/pedido/{table}', [TicketController::class, 'ticketPedido'])->name('ticket.pedido');
    Route::post('ticket/pf/{table}', [TicketController::class, 'final'])->name('ticket.pedido1'); 

    



   

});

