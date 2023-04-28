<?php

namespace App\Http\Livewire\Tables;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Employees extends Component
{
    public $user;
    public $employees;
    public $list_roles; /*  Propiedad que guarda los roles existentes en la base de datos ------- los datos se le pasa cuando se declara*/


    public $filter = ''; /* Propiedad para filtros complejos -----> aun no funciona */
    public $search = ''; /* Prpiedad que esta conectada con el,input search */

   

    public function render()
    {
        $this->user = session()->get('user'); /* Monto en una sola una ocacion el user */
        
        $url = config('app.api') . '/employee';
        $response = Http::withToken($this->user['token'])->get($url);
        $this->employees = $response->json();
        $this->employees = $this->employees['data'];

        /* Aqui realizo el filtrado de busqueda */
        if ($this->search) {
            $this->applyFilters();
        }
        /* Aqui le paso la coleccion de empleados */
        return view('livewire.tables.employees', ['employees' => $this->employees]);
    }

    public function search()
    {
        $this->employees = collect($this->employees);

        $this->employees = $this->employees->filter(function ($employee) {
            return str_contains(strtolower($employee['nombre']), strtolower($this->search));
        })->toArray();
    }

    public function applyFilters()
    {
        $this->employees = collect($this->employees);
       /*  if ($this->filterBy && $this->filterValue) {
            $this->employees = collect($this->employees)->filter(function ($employee) {
                return $employee[$this->filterBy] == $this->filterValue;
            })->toArray();
        } */

        if ($this->search) {
            $this->employees = collect($this->employees)->filter(function ($employee) {
                return str_contains(strtolower($employee['nombre']), strtolower($this->search));
            })->toArray();
        }
    }
}
