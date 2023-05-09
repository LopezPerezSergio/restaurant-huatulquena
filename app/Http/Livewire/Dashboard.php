<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $employees;

    public function getEmployeeData()
    {
        $this->employees = collect($this->employees);
    $roles=$this->employees->pluck('rolName');
    $roleCounts = $roles->countBy();
    $this->employees = [
        'labels' => $roleCounts->keys(),
        'data' => $roleCounts->values(),
    ];
    }
    public function render()
    {
        $this->getEmployeeData();
        return view('livewire.dashboard');
    }
}
