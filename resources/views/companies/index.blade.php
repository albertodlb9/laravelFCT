<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-700">Listado de companias:</h2>
    </x-slot>
    <div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded-lg">
        <table class="w-full border-collapse border border-gray-200 text-center">
            <thead class="bg-gray-700">
                <tr>
                    <th class="p-3 border border-gray-300">Nombre</th>
                    <th class="p-3 border border-gray-300">CIF</th>
                    <th class="p-3 border border-gray-300">Dirección</th>
                    <th class="p-3 border border-gray-300">Email</th>
                    <th class="p-3 border border-gray-300">Telefono</th>
                    <th class="p-3 border border-gray-300">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($companies as $company)
                    <tr class="hover:bg-gray-100">
                        <td class="p-3 border border-gray-300">{{ $company->name }}</td>
                        <td class="p-3 border border-gray-300">{{ $company->cif }}</td>
                        <td class="p-3 border border-gray-300">{{ $company->address }}</td>
                        <td class="p-3 border border-gray-300">{{ $company->contact_email }}</td>
                        <td class="p-3 border border-gray-300">{{ $company->tlfn }}</td>
                        <td class="p-3 border border-gray-300 flex justify-center gap-2">
                            <a href="{{ route('companies.edit', $company->id) }}" class="text-blue-600 hover:text-blue-800 font-semibold btn border border-gray-300">Editar</a>
                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 transition">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
        <a href="{{ route('companies.create') }}" class="inline-block bg-green px-4 py-2 rounded-md hover:bg-green-700 transition border border-gray-300">Crear Compania</a>
        </div>
    </div>
</x-app-layout>
