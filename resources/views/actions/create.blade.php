<x-app-layout>
    <x-slot name="header">
        <h2>Crear Accion</h2>
    </x-slot>

    <form action="{{ route('actions.store') }}" method="POST">
        @csrf
        <label for="date">Fecha:</label>
        <input type="date" name="date" id="date">
        <br>
        <label for="description">Descripcion:</label>
        <input type="text" name="description" id="description">
        <br>
        <label for="interval">Intervalo:</label>
        <input type="number" name="interval" id="interval">
        <br>
        <label for="user_id">Alumno:</label>
        <select name="user_id" id="user_id">
            @foreach ($users as $user)
                <option value="{{ $user->id }}" >{{ $user->name }}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Guardar Accion</button>
    </form>
</x-app-layout>