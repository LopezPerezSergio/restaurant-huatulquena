<!-- resources/views/components/ModalEdit.blade.php -->
@props(['title'])

<div x-data="{ isOpen: false }">
    <button @click="isOpen = true" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
        Editar
    </button>

    <div x-show="isOpen" x-cloak class="fixed inset-0 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">{{ $title }}</h2>

            <div class="mb-4">
                {{ $slot }}
            </div>

            <div class="flex justify-end">
                <button @click="isOpen = false" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded">
                    Cancelar
                </button>
                <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                    Guardar
                </button>
            </div>
        </div>
    </div>
</div>
