<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Informacion Usuario</h2>
    </x-slot>
    <h1>Informacion usuario</h1>
    <div>
        <ul>
            <li>Nombre: {{$user->name}}</li>
            <li>Apellido 1: {{$user->surname1}}</li>
            <li>Apellido 2: {{$user->surname2}}</li>
            <li>Telefono: {{$user->tlfn}}</li>
            <li>Email: {{$user->email}}</li>
        </ul>    
    </div>
    <h2>Empresas</h2>
    <div>
        <ul>
            @foreach($user->companies as $company)
                <li>{{$company->name}}</li>
            @endforeach
        </ul>
    </div>
    <h2>Roles</h2>
    <div>
        <ul>
            @foreach($user->rols as $role)
                <li>{{$role->name}}</li>
            @endforeach
        </ul>
    </div>

</x-app-layout>