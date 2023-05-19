<x-app>
    <x-slot:navbar>
        <x-navbar.siderbar />
        </x-slot>

        <x-slot:title>
            PRUEBA TICKET
        </x-slot>
        
        <div>
            <a href="{{ route('pdf.imprimir') }}" class="w-full sm:w-auto justify-center text-white inline-flex bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                IMPRIMIR
            </a>
            
        </div>

</x-app>
