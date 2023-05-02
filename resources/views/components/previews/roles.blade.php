<!-- Preview Drawer -->
<div id="drawer-read-rol-{{ $id }}-advanced"
    class="overflow-y-auto fixed top-0 left-0 z-50 p-4 w-full max-w-lg h-screen bg-white transition-transform -translate-x-full dark:bg-gray-800"
    tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
    <div class="mb-4">
        <h4 class="mb-1 text-3xl font-extrabold text-gray-900 dark:text-white">
            <span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-800 from-sky-700">
                Empleados como:
        </h4>
        <h4 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white">
            <span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-800 from-sky-700">
                {{ $title }}
        </h4>
        <a href="{{ route('employees.index') }}" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
            Ver todos los empleados
        </a>
        <button type="button" data-drawer-dismiss="drawer-read-rol-{{ $id }}-advanced"
            aria-controls="drawer-read-rol-{{ $id }}-advanced"
            class="mb-1.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
            <span class="sr-only">Close menu</span>
        </button>
    </div>

    <dl class="grid grid-cols-2 gap-4 mb-4">
        {{ $data }}
    </dl>
</div>
