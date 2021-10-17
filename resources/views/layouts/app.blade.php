<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cinema devotion</title>
    {{-- style --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    {{-- style --}}
    {{-- Livewire style--}}
    <livewire:styles />
    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="icon" href="{{asset('assets/fav.png')}}" type="image/x-icon">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body class="text-white bg-gray-900">

    {{-- start page --}}
    <header class="border-b border-gray-600 ">
        <nav class="container fixed z-10 flex flex-col items-center justify-between min-w-full bg-gray-600 md:p-5 lg:flex-row">
            {{-- Left nav --}}
            <div class="flex flex-col items-center lg:flex-row">
                <a href="{{route('movies.index')}}"><img class="flex-none w-16 h-16" src="{{asset('assets/logo.png')}}" alt="Logo"></a>
                <ul class="flex m-0 mt-6 space-x-8 lg:ml-16 lg:mt-0">
                    <li><a href="{{route('movies.index')}}" class="hover:text-gray-400">Movies</a></li>
                    <li><a href="{{route('series.index')}}" class="hover:text-gray-400">Series</a></li>
                    <li class="hidden md:block"><a href="#" class="hover:text-gray-400">Coming Soon</a></li>
                    <li class="md:hidden"><a href="{{route('favorite')}}" class="hover:text-gray-400">favorite
                        (
                        <!-- if session has both movie and series in favorite -->
                        @if (Session::has('FavMovie') && Session::has('FavSeries'))
                        <span id="QtyCount">
                                {{ Session::get('FavMovie')->totalQty + Session::get('FavSeries')->totalQty }}
                        </span>
                        <!-- if session has movie in favorite -->
                        @elseif (Session::has('FavMovie'))
                        <span id="QtyCount">
                                {{ Session::get('FavMovie')->totalQty}}
                        </span>
                        <!-- if session has series in favorite -->
                        @elseif (Session::has('FavSeries'))
                        <span id="QtyCount">
                                {{Session::get('FavSeries')->totalQty}}
                        </span>
                        @endif
                        )
                    </a></li>

                </ul>
            </div>
            {{-- right nav --}}
            <div class="flex items-center pt-2 pb-2 md:pt-0 md:pb-0 md:mt-6 lg:mt-0">
                {{-- Livewire search --}}
                <livewire:search-dropdown>
                <!-- <div class="ml-6">
                    <a href="#"><img class="w-9" src="{{asset('assets/avatar.png')}}" alt="avatar"></a>
                </div> -->
                <div class="hidden ml-6 md:block">
                   <a href="{{route('favorite')}}"  class="p-3 mr-2 text-red-600 bg-gray-200 rounded-xl">
                   <i class="text-2xl text-red-600 fas fa-heart"></i>
                   <!-- if session has both movie and series in favorite -->
                    @if (Session::has('FavMovie') && Session::has('FavSeries'))
                    <span id="QtyCount">
                            {{ Session::get('FavMovie')->totalQty + Session::get('FavSeries')->totalQty }}
                    </span>
                    <!-- if session has movie in favorite -->
                    @elseif (Session::has('FavMovie'))
                    <span id="QtyCount">
                            {{ Session::get('FavMovie')->totalQty}}
                    </span>
                    <!-- if session has series in favorite -->
                    @elseif (Session::has('FavSeries'))
                    <span id="QtyCount">
                            {{Session::get('FavSeries')->totalQty}}
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
        <div class="container flex px-4 py-6 mx-auto">
            <div>  Powerd By <a href="https://www.themoviedb.org/" target="_blank" class="text-blue-500 hover:text-blue-900">TMDB   API</a> <span class="block md:inline-block md:ml-64"> Designed By <a class="text-blue-500 hover:text-blue-900" href="https://www.facebook.com/profile.php?id=100021391685332" target="_blank">Eslam Abdallah</a> </span>
            </div>
        </div>
    </footer>
    {{-- Livewire --}}
    <livewire:scripts />
    {{-- Alpin.js --}}
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    @yield('js')
</body>
</html>
