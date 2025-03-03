
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-700">Listado de usuarios:</h2>
    </x-slot>
    <div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded-lg">
        <table class="w-full border-collapse border border-gray-200 text-center">
            <thead class="bg-gray-700">
                <tr>
                    <th class="p-3 border border-gray-300">Nombre</th>
                    <th class="p-3 border border-gray-300">Apellido 1</th>
                    <th class="p-3 border border-gray-300">Apellido 2</th>
                    <th class="p-3 border border-gray-300">Teléfono</th>
                    <th class="p-3 border border-gray-300">Email</th>
                    <th class="p-3 border border-gray-300">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($users as $user)
                    @if(Auth::user()->hasRole('teacher','tutor') && $user->hasRole('pupil')) 
                        <tr class="hover:bg-gray-100">
                            <td class="p-3 border border-gray-300">{{ $user->name }}</td>
                            <td class="p-3 border border-gray-300">{{ $user->surname1 }}</td>
                            <td class="p-3 border border-gray-300">{{ $user->surname2 }}</td>
                            <td class="p-3 border border-gray-300">{{ $user->tlfn }}</td>
                            <td class="p-3 border border-gray-300">{{ $user->email }}</td>
                            <td class="p-3 border border-gray-300 flex gap-2">
                            <a href="{{ route('users.show', $user->id) }}" class="text-blue-600 hover:text-blue-800 font-semibold btn">Mas info</a>
                        @if(Auth::user()->hasRole('admin','teacher'))
                            <a href="{{ route('users.edit', $user->id) }}" class="text-blue-600 hover:text-blue-800 font-semibold btn">Editar</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 transition">Eliminar</button>
                            </form>
                        @endif
                        @elseif(Auth::user()->hasRole('admin'))
                            <tr class="hover:bg-gray-100">
                            <td class="p-3 border border-gray-300">{{ $user->name }}</td>
                            <td class="p-3 border border-gray-300">{{ $user->surname1 }}</td>
                            <td class="p-3 border border-gray-300">{{ $user->surname2 }}</td>
                            <td class="p-3 border border-gray-300">{{ $user->tlfn }}</td>
                            <td class="p-3 border border-gray-300">{{ $user->email }}</td>
                            <td class="p-3 border border-gray-300 flex gap-2">
                            <a href="{{ route('users.show', $user->id) }}" class="text-blue-600 hover:text-blue-800 font-semibold btn">Mas info</a>
                            @if(Auth::user()->hasRole('admin','teacher'))
                            <a href="{{ route('users.edit', $user->id) }}" class="text-blue-600 hover:text-blue-800 font-semibold btn">Editar</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 transition">Eliminar</button>
                            </form>
                        @endif
                        @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if(Auth::user()->hasRole('admin','teacher'))
        <div class="mt-4">
            <a href="{{ route('users.create') }}" class="inline-block bg-green px-4 py-2 rounded-md hover:bg-green-700 transition">
                Crear Usuario
            </a>
        </div>
        @endif
    </div>
</x-app-layout>
