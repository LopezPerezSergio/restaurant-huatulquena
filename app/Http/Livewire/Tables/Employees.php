<?php

namespace App\Http\Livewire\Tables;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Employees extends Component
{

    public $employees;
    public $roles; /*  Propiedad que guarda los roles existentes en la base de datos ------- los datos se le pasa cuando se declara*/

    public $search = ''; /* Prpiedad que esta conectada con el,input search */
    public $filter = ''; /* Propiedad para filtros complejos -----> aun no funciona */

    public function render()
    {
        /* Aqui realizo el filtrado de busqueda */
        $this->filters();

        /* Aqui le paso la coleccion de empleados y roles por default al ser un componente */
        return view('livewire.tables.employees', ['employees' => $this->employees]);
    }

    public function filters()
    {
        if ($this->search) {
            $this->employees = array_filter($this->employees, function ($employee) {
                return str_contains(strtolower($employee['nombre']), strtolower($this->search));
            });
        }
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
