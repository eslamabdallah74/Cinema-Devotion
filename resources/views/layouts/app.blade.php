<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MoviesZone</title>
    {{-- style --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    {{-- style --}}
    {{-- Livewire style--}}
    <livewire:styles />
    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>



</head>
<body class="text-white bg-gray-900">

    {{-- start page --}}
    <header class="border-b border-gray-600">
        <nav class="container fixed z-10 flex flex-col items-center justify-between min-w-full p-5 bg-gray-600 lg:flex-row sm:p-0">
            {{-- Left nav --}}
            <div class="flex flex-col items-center lg:flex-row">
                <a href="{{route('movies.index')}}"><img class="flex-none" src="{{asset('assets/favicon-32x32.png')}}" alt="Logo"></a>
                <ul class="flex m-0 mt-6 space-x-8 lg:ml-16 lg:mt-0">
                    <li><a href="{{route('movies.index')}}" class="hover:text-gray-400">Movies</a></li>
                    <li><a href="{{route('series.index')}}" class="hover:text-gray-400">Series</a></li>
                    <li><a href="#" class="hover:text-gray-400">Coming Soon</a></li>
                </ul>
            </div>
            {{-- right nav --}}
            <div class="flex items-center mt-6 lg:mt-0">
                {{-- Livewire search --}}
                <livewire:search-dropdown>
                <!-- <div class="ml-6">
                    <a href="#"><img class="w-9" src="{{asset('assets/avatar.png')}}" alt="avatar"></a>
                </div> -->
                <div class="ml-6">
                   <a href="#"  class="p-3 mr-2 text-red-600 bg-gray-200 rounded-xl sm:hidden">
                   <i class="text-2xl text-red-600 fas fa-heart"></i>
                        <span id="QtyCount">
                        @if (Session::has('FavMovie'))
                            {{ Session::get('FavMovie')->totalQty }}
                        </span>
                       @endif
                   </a>
                </div>
            </div>
        </nav>
    </header>

    <main class="py-8">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="border-t border-gray-800">
        <div class="container px-4 py-6 mx-auto">
            Powerd By <a href="https://www.themoviedb.org/" target="_blank" class="text-blue-500 hover:text-blue-900">TMDB API</a>
        </div>
    </footer>
    {{-- Livewire --}}
    <livewire:scripts />
    {{-- Alpin.js --}}
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    @yield('js')
</body>
</html>
