<x-app>
    <x-slot:navbar>
        <x-navbar.siderbar />
    </x-slot:navbar>

    <x-slot:title>
        Pagos / Nominas
    </x-slot:title>

    {{-- Boton para formulario de otros gastos --}}
    <div class="grid gap-4 mb-4 sm:grid-cols-4">
        <div class="flex justify-start">
            <button type="submit" id="createPayButton" data-modal-toggle="createPayModal"
                class="w-full sm:w-auto justify-center text-white inline-flex bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                Otros Gastos
            </button>
        </div>
    </div>

    @livewire('tables.payments', ['employees' => $employees, 'payments' => $payments, 'ventas' => $ventas])

    <x-modal.createPay>
        <x-slot:modulo>
            Gastos
        </x-slot:modulo>

        <x-slot:url>
            {{ route('nominas.store') }}
        </x-slot:url>

        <div class="grid gap-4 mb-4 sm:grid-cols-2">
            <div>
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre
                    (s)</label>
                <input type="text" name="nombre" id="nombre"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Nombre" required="">
            </div>
            <div>
                <label for="pago" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pago</label>
                <input type="text" name="pago" id="pago"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="$150" required="" >
            </div>
            <div>
                <label for="descripcion"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion</label>
                <input type="tel" name="descripcion" id="descripcion"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="pago de compras.....">
            </div>

        </div>
    </x-modal.createPay>
</x-app>