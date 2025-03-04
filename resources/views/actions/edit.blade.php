<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-700">Actualizar Acción</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
        <form action="{{ route('actions.update', $action->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PATCH')

            <div>
                <label for="date" class="block text-gray-700 font-semibold">Fecha:</label>
                <input type="date" name="date" id="date" value="{{ $action->date }}" 
                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="description" class="block text-gray-700 font-semibold">Descripción:</label>
                <input type="text" name="description" id="description" value="{{ $action->description }}" 
                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="interval" class="block text-gray-700 font-semibold">Intervalo:</label>
                <input type="number" name="interval" id="interval" value="{{ $action->interval }}" 
                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mt-4">
                <button type="submit" class="bg-green-600 text-black px-4 py-2 rounded-md hover:bg-green-700 transition border border-gray-300">
                    Guardar Acción
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
