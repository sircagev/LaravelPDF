@extends('layouts.app')

@section('contenido')
    <div class="col-span-12">
        <div class="mb-4 flex items-center">
            <form action="{{-- {{ route('buscar') }} --}}" method="GET" class="flex items-center">
                <input type="text" name="idBuscar" placeholder="Buscar por ID" class=" rounded-md px-2 py-1 mr-2 bg-gray-800">
                <button type="submit" class="bg-blue-500 text-white rounded-md px-2 py-1">Buscar</button>
            </form>
        </div>
        <div class="overflow-auto lg:overflow-visible ">
            <table class="table text-white border-separate space-y-6 text-sm">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="p-3">Nombre</th>
                        <th class="p-3 text-left">Cédula</th>
                        <th class="p-3 text-left">Telefono</th>
                        <th class="p-3 text-left">Direccion</th>
                        <th class="p-3 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse  ($users as $user)
                        <tr class="bg-gray-800">
                            <td class="p-3">
                                <div class="flex align-items-center">
                                    <img class="rounded-full h-12 w-12  object-cover"
                                        src="https://images.unsplash.com/photo-1613588718956-c2e80305bf61?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=634&q=80"
                                        alt="unsplash image">
                                    <div class="ml-3">
                                        <div class="">{{ $user->nombre }}</div>
                                        <div class="text-gray-500">{{ $user->nombre }}@gmail.com</div>
                                    </div>
                                </div>
                            </td>
                            <td class="p-3">
                                {{ $user->cedula }}
                            </td>
                            <td class="p-3 font-bold">
                                {{ $user->telefono }}
                            </td>
                            <td class="p-3 text-center">
                                <span class="bg-green-400 text-gray-50 rounded-md px-2">{{ $user->direccion }}</span>
                            </td>
                            <td class="p-3 flex">
                                <form action="{{ route('exportarpdf',['id' => $user->id]) }}">
                                    @csrf
                                    <button type="submit" class="text-gray-400 hover:text-gray-100">
                                        <i class="material-icons-round text-base">description</i>
                                    </button>
                                </form>
                                <form action="{{ route('usuarios.profile', ['id' => $user->id]) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="text-gray-400 hover:text-gray-100">
                                        <i class="material-icons-round text-base">visibility</i>
                                    </button>    
                                </form>
                                <form action="{{ route('usuarios.editar', ['id' => $user->id]) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="text-gray-400 hover:text-gray-100">
                                        <i class="material-icons-round text-base">edit</i>
                                    </button>    
                                </form>
                                <form action="{{ route('eliminar', ['id' => $user->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-gray-400 hover:text-gray-100">
                                        <i class="material-icons-round text-base">delete_outline</i>
                                    </button>    
                                </form>
                            </td>
                            @empty
                            <tr>
                                <td colspan="5" class="p-3 text-center">No se encontraron resultados.</td>
                            </tr>
                        </tr>
                    @endforelse 
                </tbody>
            </table>
        </div>
    </div>
    <style>
        .table {
            border-spacing: 0 15px;
        }

        i {
            font-size: 1rem !important;
        }

        .table tr {
            border-radius: 20px;
        }

        tr td:nth-child(n+5),
        tr th:nth-child(n+5) {
            border-radius: 0 .625rem .625rem 0;
        }

        tr td:nth-child(1),
        tr th:nth-child(1) {
            border-radius: .625rem 0 0 .625rem;
        }
    </style>
@endsection
