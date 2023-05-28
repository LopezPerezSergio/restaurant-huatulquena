<x-app>
    <x-slot:navbar>
        <x-navbar.siderbar />
    </x-slot:navbar>

    <x-slot:title>
        Orden para {{ $table['nombre'] }}
    </x-slot:title>

    @if ($table['status'] == 1)
        @livewire('orders.create', ['employees' => $employees, 'categories' => $categories, 'products' => $products])
    @elseif ($table['status'] == 2)
        @livewire('orders.update', ['employees' => $employees, 'categories' => $categories, 'products' => $products])
    @endif



    {{-- Codificacion componente  mandar mesas al compooenente --}}
    {{-- @livewire('tables.pruebas', ['categories' => $categories, 'employees' => $employees, 'user' => $user, 'tables' => $tables , 'products' =>$products])
 --}}
</x-app>
