<x-app-layout>
    <x-slot name="header">
        <h2>Crear Empresa</h2>
    </x-slot>

    <form action="{{ route('companies.store') }}" method="POST">
        @csrf
        <label for="name">Nombre de la Empresa:</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="cif">CIF:</label>
        <input type="text" name="cif" id="cif">
        <br>
        <label for="address">Dirección:</label>
        <input type="text" name="address" id="address">
        <br>
        <label for="contact_email">Correo Electrónico:</label>
        <input type="email" name="contact_email" id="contact_email">
        <br>
        <label for="tlfn">Teléfono de Contacto:</label>
        <input type="text" name="tlfn" id="tlfn">
        <br>
        <button type="submit">Guardar Empresa</button>
    </form>
</x-app-layout>
