<x-app-layout>
    <x-slot name="header">
        <h2>Actualizar Acción</h2>
    </x-slot>

    <form action="{{ route('actions.update', $action->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="date">Fecha:</label>
        <input type="date" name="date" id="date" value="{{ $action->date }}">
        <br>
        <label for="description">Descripción:</label>
        <input type="text" name="description" id="description" value="{{ $action->description }}">
        <br>
        <label for="interval">Intervalo:</label>
        <input type="number" name="interval" id="interval" value="{{ $action->interval }}">
        <br>
        <label for="user_id">Alumno:</label>
        <select name="user_id" id="user_id">
            @foreach ($pupils as $user)
                <option value="{{ $user->id }}" {{ $user->id == $action->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
            @endforeach
        </select>
        <button type="submit">Guardar Acción</button>
    </form>
</x-app-layout>