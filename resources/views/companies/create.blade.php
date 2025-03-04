<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-700">Crear Empresa</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
        <form action="{{ route('companies.store') }}" method="POST" class="space-y-4">
            @csrf
            
            <div>
                <label for="name" class="block font-semibold text-gray-700">Nombre de la Empresa:</label>
                <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
            </div>
            
            <div>
                <label for="cif" class="block font-semibold text-gray-700">CIF:</label>
                <input type="text" name="cif" id="cif" class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
            </div>
            
            <div>
                <label for="address" class="block font-semibold text-gray-700">Dirección:</label>
                <input type="text" name="address" id="address" class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
            </div>
            
            <div>
                <label for="contact_email" class="block font-semibold text-gray-700">Correo Electrónico:</label>
                <input type="email" name="contact_email" id="contact_email" class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
            </div>
            
            <div>
                <label for="tlfn" class="block font-semibold text-gray-700">Teléfono de Contacto:</label>
                <input type="text" name="tlfn" id="tlfn" class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
            </div>
            
            <div class="flex justify-end">
                <button type="submit" class="bg-green-600 text-black px-4 py-2 rounded-md hover:bg-green-700 transition">
                    Guardar Empresa
                </button>
            </div>
        </form>
    </div>
</x-app-layout>

