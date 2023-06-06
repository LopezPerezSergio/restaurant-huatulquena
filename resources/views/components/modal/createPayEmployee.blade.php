@props(['enctype' => null])

<form action="{{ $url }}" method="POST" {{ $enctype }}>
    @csrf
    {{ $slot }}

    <div class="flex justify-end">
        <button type="submit"
            class="w-full sm:w-auto justify-center text-white inline-flex bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
            Agregar
        </button>
    </div>
</form>

