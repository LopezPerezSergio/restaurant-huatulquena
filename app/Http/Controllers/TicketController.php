<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Http;

class TicketController extends Controller
{
    public function ticketPedido($table)
    {
        if (!session()->get('user')) {
            return redirect()->route('auth.login');
        }

        $user = session()->get('user');

        $url = config('app.api') . '/table/' . $table;
        $response = Http::withToken($user['token'])->get($url);
        $table = $response->json('data');

        $url = config('app.api') . '/employee/search-id/' . $table['idEmpleado'];
        $response = Http::withToken($user['token'])->get($url);
        $employee = $response->json('data');

        $pdf = PDF::setPaper('8.5x11')->loadView('pdf.ticket', [
            'table' => $table['nombre'],
            'employee' => $employee['nombre'] . ' ' . $employee['apellidos']
        ]);

        return $pdf->stream('Ticket-Pedido');
    }
}
