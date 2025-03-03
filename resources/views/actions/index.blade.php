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
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($actions as $action)
                    @if($action->user->id == Auth::user()->id)
                    <tr class="hover:bg-gray-100">
                        <td class="p-3 border border-gray-300">{{ $action->description }}</td>
                        <td class="p-3 border border-gray-300">{{ $action->date }}</td>
                        <td class="p-3 border border-gray-300">{{ $action->interval }}</td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        @endif

</x-app-layout>
