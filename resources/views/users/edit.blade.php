<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Actualizar Usuario</h2>
    </x-slot>

    <div class="max-w-400 mx-auto p-6 bg-gray-50 border border-gray-300 shadow-md rounded-lg">
        <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium text-gray-800">Nombre:</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}"
                    class="mt-1 w-full p-2 bg-white border border-gray-400 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="surname1" class="block text-sm font-medium text-gray-800">Apellido 1:</label>
                <input type="text" name="surname1" id="surname1" value="{{ $user->surname1 }}"
                    class="mt-1 w-full p-2 bg-white border border-gray-400 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="surname2" class="block text-sm font-medium text-gray-800">Apellido 2:</label>
                <input type="text" name="surname2" id="surname2" value="{{ $user->surname2 }}"
                    class="mt-1 w-full p-2 bg-white border border-gray-400 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="tlfn" class="block text-sm font-medium text-gray-800">Teléfono:</label>
                <input type="text" name="tlfn" id="tlfn" value="{{ $user->tlfn }}"
                    class="mt-1 w-full p-2 bg-white border border-gray-400 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-800">Email:</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}"
                    class="mt-1 w-full p-2 bg-white border border-gray-400 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-800">Contraseña:</label>
                <input type="password" name="password" id="password"
                    class="mt-1 w-full p-2 bg-white border border-gray-400 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div @if(Auth::user()->hasRole('admin')) class="block" @else class="hidden" @endif>
                <label for="rol">Rol</label>
                <select name="rol" id="rol">
                    @foreach($rols as $rol)
                        <option value="{{$rol->id}}" {{$user->rols->contains($rol) ? 'selected' : ''}}>{{$rol->name}}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="company">Empresa</label>
                <select name="company" id="company">
                    @foreach($companies as $company)
                        <option value="{{$company->id}}" {{$user->companies->contains($company) ? 'selected' : ''}}>{{$company->name}}</option>
                    @endforeach
                </select>
            </div>


            <div>
                <label for="tutor">Tutor</label>
                <select name="tutor" id="tutor">
                    @foreach($tutors as $tutor)
                        <option value="{{$tutor->id}}" {{$user->tutor_id == $tutor->id ? 'selected' : ''}}>{{$tutor->name}}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="teacher">Profesor:</label>
                <select name="teacher" id="teacher">
                    @foreach($teachers as $teacher)
                        <option value="{{$teacher->id}}" {{$user->teacher_id == $teacher->id ? 'selected' : ''}}>{{$teacher->name}}</option>
                    @endforeach
                </select>
            </div>


            <div class="flex justify-end">
                <button type="submit"
                    class="bg-green-600 px-4 py-2 rounded-md hover:bg-green-700 transition">
                    Guardar Usuario
                </button>
            </div>
        </form>
    </div>
</x-app-layout>

