<?php

namespace App\Http\Livewire\Tables;

use Livewire\Component;

class Employees extends Component
{
    /* variables con el contenido de la informacion */
    public $employees;
    public $roles;

    /* Variable que contendra la listade empleados para el filtrado */
    public $filterEmployees;

    /* Variables para los filtros */
    public $search = '';
    public $filter_rol = '';
    public $filter_status = '';

    public function mount()
    {
        $this->filterEmployees = $this->employees;
    }

    public function render()
    {
        return view('livewire.tables.employees');
    }

    public function updatedSearch($value)
    {
        if ($value) {
            $this->filterEmployees = array_filter($this->employees, function ($employee) use ($value) {
                return str_contains(strtolower($employee['nombre']), strtolower($value));
            });
        } else {
            $this->filterEmployees = $this->employees;
        }
    }

    public function updatedFilterRol($value)
    {
        if ($value) {
            $this->filterEmployees = array_filter($this->employees, function ($employee) use ($value) {
                return str_contains(strtolower($employee['rolName']), strtolower($value));
            });
        } else {
            $this->filterEmployees = $this->employees;
        }
        $this->reset('filter_status');
    }

    public function updatedFilterStatus($value)
    {
        if ($value == '0' || $value == '1') {
            $this->filterEmployees = array_filter($this->employees, function ($employee) use ($value) {
                return $employee['status'] == $value;
            });
        } else {
            $this->filterEmployees = $this->employees;
        }
        $this->reset('filter_rol');
    }

    public function clear()
    {
        $this->reset(['filter_rol', 'filter_status', 'search']);
        $this->filterEmployees = $this->employees;
    }
}
