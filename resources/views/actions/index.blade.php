<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-700">Listado de Tareas:</h2>
    </x-slot>
    <div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded-lg">
        @if(Auth::user()->hasRole('pupil'))
        @php $count = 0 @endphp
        @foreach($actions as $action)   
                    @if($action->user->id == Auth::user()->id)
                        @php $count = $count + $action->interval @endphp
                    @endif
                @endforeach
        <h2>Tareas de: {{Auth::user()->name}} {{Auth::user()->surname1}}  Duracion total: {{$count}} h</h2>
        <table class="w-full border-collapse border border-gray-200 text-center">
            <thead class="bg-gray-700">
                <tr>
                    <th class="p-3 border border-gray-300">Descripcion</th>
                    <th class="p-3 border border-gray-300">Fecha</th>
                    <th class="p-3 border border-gray-300">Duracion</th>
                    @if(Auth::user()->hasRole('teacher','pupil'))
                    <th class="p-3 border border-gray-300">Acciones</th>
                    @endif
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($actions as $action)
                    @if($action->user->id == Auth::user()->id)
                    <tr class="hover:bg-gray-100">
                        <td class="p-3 border border-gray-300">{{ $action->description }}</td>
                        <td class="p-3 border border-gray-300">{{ $action->date }}</td>
                        <td class="p-3 border border-gray-300">{{ $action->interval }}</td>
                        @if(Auth::user()->hasRole('teacher','pupil'))
                        <td class="p-3 border border-gray-300 flex gap-2">
                            <a href="{{ route('actions.edit', $action->id) }}" class="text-blue-600 hover:text-blue-800 font-semibold btn">Editar</a>
                            <form action="{{ route('actions.destroy', $action->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 transition">Eliminar</button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endif
                @endforeach
            </tbody>
            
        </table>
        <div class="mt-4">
            <a href="{{ route('actions.create',['id' => Auth::user()->id]) }}" class="inline-block bg-green px-4 py-2 rounded-md hover:bg-green-700 transition">
                Crear Tarea
            </a>
        </div>
        @endif
        @if(Auth::user()->hasRole('teacher','tutor'))
        @foreach($users as $user)
        @if(DB::table('pupils_teachers_tutors')->where('pupil_id', $user->id)->value('teacher_id') == Auth::user()->id || DB::table('pupils_teachers_tutors')->where('pupil_id', $user->id)->value('tutor_id') == Auth::user()->id)
        @php $count = 0 @endphp
        @foreach($actions as $action)   
                    @if($action->user->id == $user->id)
                        @php $count = $count + $action->interval @endphp
                    @endif
                @endforeach
        <h2>Tareas de: {{$user->name}} {{$user->surname1}}  Duracion total: {{$count}} h</h2>
        <table class="w-full border-collapse border border-gray-200 text-center">
            <thead class="bg-gray-700">
                <tr>
                    <th class="p-3 border border-gray-300">Descripcion</th>
                    <th class="p-3 border border-gray-300">Fecha</th>
                    <th class="p-3 border border-gray-300">Duracion</th>
                    @if(Auth::user()->hasRole('teacher','pupil'))
                    <th class="p-3 border border-gray-300">Acciones</th>
                    @endif
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($actions as $action)
                    @if($action->user->id == $user->id)
                    <tr class="hover:bg-gray-100">
                        <td class="p-3 border border-gray-300">{{ $action->description }}</td>
                        <td class="p-3 border border-gray-300">{{ $action->date }}</td>
                        <td class="p-3 border border-gray-300">{{ $action->interval }}</td>
                        @if(Auth::user()->hasRole('teacher','pupil'))
                        <td class="p-3 border border-gray-300 flex gap-2">
                            <a href="{{ route('actions.edit', $action->id) }}" class="text-blue-600 hover:text-blue-800 font-semibold btn">Editar</a>
                            <form action="{{ route('actions.destroy', $action->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 transition">Eliminar</button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        
        @endif
        
        @endforeach
        @if(Auth::user()->hasRole('teacher'))
        <div class="mt-4">
            <a href="{{ route('actions.create',$user->id) }}" class="inline-block bg-green px-4 py-2 rounded-md hover:bg-green-700 transition">
                Crear Tarea
            </a>
        </div>
        @endif
        <a href="{{ route('pdf.generar') }}" class="bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700" target="_blank">
            Generar PDF
        </a>
        @endif
</div>


</x-app-layout>
