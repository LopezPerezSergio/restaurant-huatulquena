<?php

namespace App\Http\Livewire;

use Livewire\Component;

class GraficaEstado extends Component
{
    public $employees;
    public function getEmployeeStatus()
    {
        
        $this->employees = collect($this->employees);
    $categorieCounts=$this->employees->pluck('status');
    $categorieCounts = $categorieCounts->countBy();
    $this->employees = [
        'labels' => $categorieCounts->keys(),
        'data' => $categorieCounts->values(),
    ];
    
    }
    public function render()
    {
        $this->getEmployeeStatus();
        
        return view('livewire.grafica-estado');
    }
}
