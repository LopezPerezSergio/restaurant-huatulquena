<x-app>
    <x-slot:navbar>
        <x-navbar.siderbar />
    </x-slot:navbar>

    <x-slot:title>
        Toma de orden
    </x-slot:title>

    {{-- Codificacion componente  --}}
    @livewire('tables.pruebas', ['categories' => $categories, 'employees' => $employees])

</x-app>
