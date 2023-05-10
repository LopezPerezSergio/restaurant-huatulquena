<x-app>
    <x-slot:navbar>
        <x-navbar.siderbar />
        </x-slot>

        <x-slot:title>
            Dashboard
        </x-slot>
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="grid grid-cols-3 gap-4 place-items-stretch h-56 ">
                
                <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                </div>
                <div class=" object-fill ">
                    {{-- Codificacion componente flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800 --}}
                    @livewire('dashboard', ['roles' => $roles, 'employees' => $employees]) {{-- Lamo el componente de livewire y le paso los roles a la propiedad roles del componente --}}

                    {{-- codificacion normal   'categories','products'--}}
                </div>
                
                <div class="object-fill">
                    @livewire('grafica-estado', ['employees' => $employees])
                </div>              
            </div>
            <div class="grid grid-cols-3 gap-4 place-items-stretch h-56 ">
                <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                </div>
                <div class=" object-fill ">
                    {{-- Codificacion componente flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800 --}}
                    @livewire('grafica-c', ['categories' => $categories, 'products' => $products]) {{-- Lamo el componente de livewire y le paso los roles a la propiedad roles del componente --}}

                    {{-- codificacion normal   'categories','products'--}}
                </div>
                <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                </div>
            </div>
        </div>

</x-app>
