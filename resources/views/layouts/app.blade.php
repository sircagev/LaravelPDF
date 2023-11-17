<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <header>
        <nav class="bg-gray-800">
            <div class="container flex items-center justify-center p-6 mx-auto capitalize text-gray-300">
                <a href="/"
                    class="border-b-2 border-transparent hover:text-gray-200 hover:border-blue-500  focus:border-blue-500 mx-1.5 sm:mx-6">Home</a>
                <a href="{{ route('usuarios.index') }}"
                    class="border-b-2 border-transparent hover:text-gray-200 hover:border-blue-500 focus:border-blue-500 mx-1.5 sm:mx-6">Listar
                    Usuarios</a>
                <a href="{{ route('registrar') }}"
                    class="border-b-2 border-transparent hover:text-gray-200 hover:border-blue-500 focus:border-blue-500 mx-1.5 sm:mx-6">Registar
                    Usuario</a>
            </div>
        </nav>
    </header>
    <main class="flex items-center justify-center  bg-gray-900 h-screen">
        @yield('contenido')
    </main>
    <footer></footer>
</body>
