<x-app-layout>
    <x-slot name="header">
        <h2>Crear Accion</h2>
    </x-slot>

    <form action="{{ route('actions.store') }}" method="POST">
        @csrf
        @if(Auth::user()->hasRole('pupil'))
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        @endif
        <label for="date">Fecha:</label>
        <input type="date" name="date" id="date">
        <br>
        <label for="description">Descripcion:</label>
        <input type="text" name="description" id="description">
        <br>
        <label for="interval">Intervalo:</label>
        <input type="number" name="interval" id="interval">
        <br>
        @if(Auth::user()->hasRole('teacher'))
        <label for="user_id">Alumno:</label>
        <select name="user_id" id="user_id">
            @foreach ($users as $user)
            @if(DB::table('pupils_teachers_tutors')->where('pupil_id', $user->id)->value('teacher_id') == Auth::user()->id )
                <option value="{{ $user->id }}" >{{ $user->name }}</option>
            @endif
            @endforeach
        </select>
        @endif
        <br>
        <button type="submit">Guardar Accion</button>
    </form>
</x-app-layout>