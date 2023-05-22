<x-app>
    <x-slot:navbar>
        <x-navbar.siderbar />
    </x-slot:navbar>

    <x-slot:title>
        Toma de orden
    </x-slot:title>

    {{-- Codificacion componente  mandar mesas al compooenente--}}
    @livewire('tables.pruebas', ['categories' => $categories, 'employees' => $employees, 'user' => $user, 'tables' => $tables , 'products' =>$products])

</x-app>
