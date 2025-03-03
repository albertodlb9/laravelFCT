<x-guest-layout>
    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Surname -->
        <div class="mt-4">
            <x-input-label for='surname1' :value="__('Apellido 1')" />
            <x-text-input id='surname1' class="block mt-1 w-full" type='text' name='surname1' :value='old("surname1")' required autofocus autocomplete='surname1' />
            <x-input-error :messages='$errors->get("surname1")' class="mt-2" />
        </div>

        <!-- Surname 2 -->
        <div class="mt-4">
            <x-input-label for='surname2' :value="__('Apellido 2')" />
            <x-text-input id='surname2' class="block mt-1 w-full" type='text' name='surname2' :value='old("surname2")' autofocus autocomplete='surname2' />
            <x-input-error :messages='$errors->get("surname2")' class="mt-2" />
        </div>

        <!--tlfn -->
        <div class="mt-4">
            <x-input-label for='tlfn' :value="__('Teléfono')" />
            <x-text-input id='tlfn' class="block mt-1 w-full" type='text' name='tlfn' :value='old("tlfn")' autofocus autocomplete='tlfn' />
            <x-input-error :messages='$errors->get("tlfn")' class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Ya te has registrado?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
