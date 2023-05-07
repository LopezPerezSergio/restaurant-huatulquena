<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $employees;
    //public $roles;
    public function getEmployeeData()
    {
    $roles=$this->employees->pluck('rolName');
    $roleCounts = $roles->countBy();
    $this->employees = [
        'labels' => $roleCounts->keys(),
        'data' => $roleCounts->values(),
    ];
    }
    public function render()
    {
        return view('livewire.dashboard');
    }
}
