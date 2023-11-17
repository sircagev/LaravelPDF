@extends('layouts.app')

@section('contenido')
    <div
        class="md:flex md:items-center md:justify-center w-full sm:w-auto md:h-full xl:w-1/2 p-8 md:p-10 lg:p-14 sm:rounded-lg md:rounded-none ">
        <div class="max-w-xl w-full space-y-12">
            <div class="lg:text-left text-center">
                <div class="flex items-center justify-center ">
                    <div class="bg-gray-800 flex flex-col w-80 border border-gray-900 rounded-lg px-8 py-10">
                        <h1 class="font-bold text-2xl text-white ">Formulario de Usuario</h1>
                        <form method="POST"
                            action="{{ isset($user) ? route('usuarios.actualizar', $user->id) : route('registrar') }}"
                            class="flex flex-col mt-10">
                            @csrf
                            @if (isset($user))
                                @method('PUT') <!-- Método PUT para actualizar -->
                            @endif
                            <label class="font-bold text-base text-white">Nombre</label>
                            <input type="text" name="nombre" placeholder="Nombre"
                                value="{{ isset($user) ? $user->nombre : '' }}"
                                class="border rounded-lg py-3 px-3 mt-1 bg-gray-900 border-gray-900 placeholder-white-500 text-white">
                            <label class="font-bold text-base text-white mt-4">Cédula</label>
                            <input type="text" name="cedula" placeholder="Cédula"
                                value="{{ isset($user) ? $user->cedula : '' }}"
                                class="border rounded-lg py-3 px-3 mt-1 bg-gray-900 border-gray-900 placeholder-white-500 text-white">
                            <label class="font-bold text-base text-white mt-4">Dirección</label>
                            <input type="text" name="direccion" placeholder="Dirección"
                                value="{{ isset($user) ? $user->direccion : '' }}"
                                class="border rounded-lg py-3 px-3 mt-1  bg-gray-900 border-gray-900 placeholder-white-500 text-white">
                            <label class="font-bold text-base text-white mt-4">Telefono</label>
                            <input type="text" name="telefono" placeholder="Telefono"
                                value="{{ isset($user) ? $user->telefono : '' }}"
                                class="border rounded-lg py-3 px-3 mt-1  bg-gray-900 border-gray-900 placeholder-white-500 text-white">
                            <input type="submit"
                                class="border border-gray-900 bg-gray-900 text-white rounded-lg py-3 font-semibold mt-4 hover:bg-gray-600"
                                value="{{ isset($user) ? 'Actualizar' : 'Registrar' }}" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
