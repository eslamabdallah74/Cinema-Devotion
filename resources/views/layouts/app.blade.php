<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cinema devotion</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- style --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    {{-- style --}}
    {{-- Livewire style--}}
    <livewire:styles />
    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="icon" href="{{asset('assets/fav.png')}}" type="image/x-icon">


</head>
<body class="text-white bg-gray-900">

    {{-- start page --}}
    <header class="border-b border-gray-600 ">
        <nav class="fixed z-10 w-full p-0 navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="p-3 bg-gray-800 md:p-1 container-fluid text">
                    <a href="{{route('movies.index')}}"><img class="flex-none w-16 h-16 navbar-brand" src="{{asset('assets/logo.png')}}" alt="Logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="mb-2 navbar-nav me-auto mb-lg-0 text-gray-50">
                    <li class="mr-10 nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Cinema Devotion</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('movies.index')}}" class="nav-link">Movies</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('series.index')}}" class="nav-link">Series</a>
                    </li>
                    <li class="md:hidden"><a href="{{route('favorite')}}" class="nav-link">favorite
                                    (
                                    <!-- if session has both movie and series in favorite -->
                                    @if (Session::has('FavMovie') && Session::has('FavSeries'))
                                    <span id="QtyCountPhone">
                                            {{ Session::get('FavMovie')->totalQty + Session::get('FavSeries')->totalQty }}
                                    </span>
                                    <!-- if session has movie in favorite -->
                                    @elseif (Session::has('FavMovie'))
                                    <span id="QtyCountPhone">
                                            {{ Session::get('FavMovie')->totalQty}}
                                    </span>
                                    <!-- if session has series in favorite -->
                                    @elseif (Session::has('FavSeries'))
                                    <span id="QtyCountPhone">
                                            {{Session::get('FavSeries')->totalQty}}
                                    </span>
                                    @endif
                                    )
                                </a></li>
                    <li class="nav-item">
                    <a class="nav-link disabled">Comming Soon</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <livewire:search-dropdown>
                </form>
                    <!-- Favorite -->
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
            </div>
        </nav>
    </header>

    <main class="py-8">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="border-t border-gray-800">
        <div class="container flex px-4 py-6 mx-auto">
            <div>  Powerd By <a href="https://www.themoviedb.org/" target="_blank" class="text-blue-500 hover:text-blue-900">TMDB   API</a> <span class="block md:inline-block"> <span class="border-b-4">&</span> Designed By <a class="text-blue-500 hover:text-blue-900" href="https://www.facebook.com/profile.php?id=100021391685332" target="_blank">Eslam Abdallah</a> </span>
            </div>
        </div>
    </footer>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    {{-- Livewire --}}
    <livewire:scripts />
    {{-- Alpin.js --}}
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>

    @yield('js')
</body>
</html>
