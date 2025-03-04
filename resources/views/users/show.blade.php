<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-700">Información del Usuario</h2>
    </x-slot>

    <div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Información del Usuario</h1>
        
        <div class="bg-gray-100 p-4 rounded-md shadow">
            <ul class="space-y-2 text-gray-700">
                <li><strong>Nombre:</strong> {{ $user->name }}</li>
                <li><strong>Apellido 1:</strong> {{ $user->surname1 }}</li>
                <li><strong>Apellido 2:</strong> {{ $user->surname2 }}</li>
                <li><strong>Teléfono:</strong> {{ $user->tlfn }}</li>
                <li><strong>Email:</strong> {{ $user->email }}</li>
            </ul>
        </div>

        <h2 class="text-xl font-semibold text-gray-800 mt-6">Empresas Asociadas</h2>
        <div class="bg-gray-100 p-4 rounded-md shadow mt-2">
            <ul class="space-y-2 text-gray-700">
                @foreach($user->companies as $company)
                    <li class="border-b py-2">{{ $company->name }}</li>
                @endforeach
            </ul>
        </div>

        <h2 class="text-xl font-semibold text-gray-800 mt-6">Roles</h2>
        <div class="bg-gray-100 p-4 rounded-md shadow mt-2">
            <ul class="space-y-2 text-gray-700">
                @foreach($user->rols as $role)
                    <li class="border-b py-2">{{ $role->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
