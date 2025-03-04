<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Crear Acción</h2>
    </x-slot>

    <div class="max-w-2xl mx-auto p-6 bg-gray-50 border border-gray-300 shadow-md rounded-lg">
        <form action="{{ route('actions.store') }}" method="POST" class="space-y-4">
            @csrf
            @if(Auth::user()->hasRole('pupil'))
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            @endif

            <div>
                <label for="date" class="block text-sm font-medium text-gray-800">Fecha:</label>
                <input type="date" name="date" id="date" 
                    class="mt-1 w-full p-2 border border-gray-400 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-800">Descripción:</label>
                <input type="text" name="description" id="description"
                    class="mt-1 w-full p-2 border border-gray-400 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="interval" class="block text-sm font-medium text-gray-800">Intervalo:</label>
                <input type="number" name="interval" id="interval"
                    class="mt-1 w-full p-2 border border-gray-400 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            @if(Auth::user()->hasRole('teacher'))
                <div>
                    <label for="user_id" class="block text-sm font-medium text-gray-800">Alumno:</label>
                    <select name="user_id" id="user_id"
                        class="mt-1 w-full p-2 border border-gray-400 rounded-md shadow-sm bg-white focus:ring-blue-500 focus:border-blue-500">
                        @foreach ($users as $user)
                            @if(DB::table('pupils_teachers_tutors')->where('pupil_id', $user->id)->value('teacher_id') == Auth::user()->id )
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            @endif

            <div class="flex justify-end">
                <button type="submit"
                    class="bg-green-600 text-black px-4 py-2 rounded-md hover:bg-green-700 transition">
                    Guardar Acción
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
