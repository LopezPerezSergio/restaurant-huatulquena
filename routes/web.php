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
//use App\Http\Controllers\TicketController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\ReporteController;
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
    //ruta donde estan los botones de ejemplos de ticket
    Route::resource('pdf', TicketController::class)->names('pdf');
    //ruta que muestra el ticket para el pedido inicial
    Route::get('pdfInicial', [TicketController::class, 'generateTicket'])->name('pdfInicial');
    //ruta que muestra el ticket para el pedido final
    //  Route::get('pdfFinal', [TicketController::class, 'generateTicketFinal'])->name('pdfFinal');
    Route::resource('salesReporte', ReporteController::class)->names('salesReporte');
    //ruta que muestra el ticket para el pedido final
    Route::get('reporte', [ReporteController::class, 'generarReporte'])->name('reporte');
    //ruta para manejar facilnebte  el reporte
    Route::get('reportehtml', [ReporteController::class, 'reportehtml'])->name('reportehtml');
    
    Route::resource('tables', TableController::class)->names('tables');
    Route::resource('orders', OrderController::class)->names('orders');

    Route::resource('nominas', PaymentController::class)->names('nominas');

    Route::resource('sales', SaleController::class)->names('sales');
    Route::get('ticket/pedido/{table}', [TicketController::class, 'ticketPedido'])->name('ticket.pedido');
    // Route::get('ticket/pedidoFinal/{idAux2}', [TicketController::class, 'generateTicketFinal'])->name('ticket.pedidoF');
//    Route::get('ticket/pedidoFinal', [TicketController::class, 'generateTicketFinal'])->name('ticket.pedidoF');
    // Route::get('ticket/pf2/{idAux3}', [TicketController::class, 'geneTF'])->name('ticket.pedidoFinal');
    Route::post('ticket/pf/{table}', [TicketController::class, 'final'])->name('ticket.pedido1');
   

});

