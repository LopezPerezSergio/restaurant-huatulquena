<?php

namespace App\Http\Livewire\Tables;

use Livewire\Component;

class Users extends Component
{

     /* variables con el contenido de la informacion */
    public $users;

     /* Variable que contendra la lista de productos para el filtrado */
    public $filterUsers;

     /* Variables para el filtros */
    public $search = ''; //nombre

    // buscar por nombre, rol, telefono

    public function mount()
     {
         $this->filterUsers = $this->users;
     }

    public function render()
    {
        return view('livewire.tables.users');
    }

    public function updatedSearch($value)
    {
        if ($value) {
            $this->filterUsers = array_filter($this->users, function ($users) use ($value) {
                return str_contains(strtolower($users['name'] .' '. $users['cel']), strtolower($value));
            });
        } else {
            $this->filterUsers = $this->users;
        }
    }

    public function clear()
    {
        $this->reset(['search']);
        $this->filterUsers = $this->users;
    }
}