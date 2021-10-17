@extends('layouts.app')

@section('content')
    <div class="mt-20 border-b border-gray-800 md: movie-info md:mt-5">
        <div class="container flex flex-col px-4 mx-auto md:py-16 md:flex-row">
            @if ($movie['poster_path'])
            <img src="{{'https://image.tmdb.org/t/p/w400/'.$movie['poster_path']}}" class="w-96" alt="Movie Poser">
            @else
            <img src="https://via.placeholder.com/250x100" class="w-96" alt="Poster Holder">
            @endif
            <div class="relative mt-6 md:ml-24">
                <span class="px-2 py-1 text-2xl font-semibold text-center rounded shadow-md md:text-4xl bg-black-400 text-white-900 ">
                   {{$movie['title']}}
                </span>
                <!-- Session Add to favorite -->
                <span class="top-0 right-0 md:absolute">
                    <div class="my-3 md:my-0 FavMovie" id="TEST" data-id="{{$movie['id']}}">
                        <a id="heart"  href="#" class="p-2 text-gray-100 bg-gray-700 rounded-t-lg btn btn-danger">
                          Add To Favorite  <i class="p-1 text-red-600 fas fa-heart fa-1x"></i>
                        </a>
                    </div>
                </span>
                <div class="flex flex-wrap mt-3 text-gray-400">
                    <svg class="w-3" viewBox="0 0 24 24"><path d="M23.363 8.584l-7.378-1.127L12.678.413c-.247-.526-1.11-.526-1.357 0L8.015 7.457.637 8.584a.75.75 0 00-.423 1.265l5.36 5.494-1.267 7.767a.75.75 0 001.103.777L12 20.245l6.59 3.643a.75.75 0 001.103-.777l-1.267-7.767 5.36-5.494a.75.75 0 00-.423-1.266z" fill="#FFA500"/></svg>
                    <span class="text-yellow-300">{{$movie['vote_average'] * 10}}%</span>
                    <span class="mx-1">|</span>
                    <span> {{\carbon\carbon::parse($movie['release_date'])->format('M d, Y')  }}</span>
                    <span class="mx-1">|</span>
                    <span>
                        @foreach ($movie['genres'] as $genre)
                        {{$genre['name'] }}@if (!$loop->last).@endif
                        @endforeach
                    </span>
                </div>
                <p class="mt-4 text-gray-300">
                    {{$movie['overview']}}
                </p>
                {{-- Movie Cast --}}
                <div class="mt-12">
                    <h4 class="font-semibold text-white"> <i class="text-yellow-300 fab fa-fort-awesome"></i> Featured Cast</h4>
                    <div class="flex mt-4">
                        @foreach ($movie['credits']['crew'] as $crew)
                        @if ($loop->index < 3)
                        <div class="mr-8">
                            <div>{{$crew['name']}}</div>
                            <div class="text-sm text-gray-400">{{$crew['job']}}</div>
                        </div>
                        @else
                            @break
                        @endif
                        @endforeach
                    </div>
                </div>
                {{-- TRAILER WRAPPER --}}
                <div x-data="{isOpen: false}">
                    {{-- button to trailer --}}
                    @if (count($movie['videos']['results']) > 0)
                    <div class="mt-10 mb-10 text-center md:text-left m:mb-0 ">
                        <button @click="isOpen = true"
                        {{-- href='https://www.youtube.com/embed/{{$movie['videos']['results']['0']['key']}}' --}}
                        class="inline-flex items-center px-5 py-4 font-semibold text-gray-900 transition duration-150 ease-in-out bg-yellow-300 rounded hover:bg-yellow-500">
                        <i class="fas fa-play"></i>
                        <span class="ml-2">Play Tralier</span>
                         </button>
                    </div>
                    @else
                    {{-- Trailer not available --}}
                    <div class="mt-10 mb-10 text-center md:text-left m:mb-0 ">
                        <a href="#"
                        class="inline-flex items-center px-5 py-4 font-semibold text-gray-900 transition duration-150 ease-in-out bg-red-300 rounded hover:bg-red-500">
                        <span class="ml-2">Sorry tralier is not available</span>
                    </a>
                    </div>
                    @endif
                        {{-- start of video model --}}
                    <div style="background-color: rgb(0, 0, 0, .5);"
                    class="fixed top-0 left-0 z-50 flex items-center w-full h-full overflow-y-auto shadow-lg"
                    x-show="isOpen"
                    >
                        <div class="container mx-auto overflow-y-auto rounded-lg lg:px-32">
                            <div class="bg-gray-900">
                                <div class="flex justify-end pt-2 pr-4">
                                    <button class="text-3xl loading-none hover:text-gray-300"
                                    @click="isOpen = false"
                                    @keydown.escape.window="isOpen = false"
                                    @click.away="isOpen = false"
                                    >&times;</button>
                                </div>
                                <div class="px-8 py-8 model-body">
                                    {{-- Model Content --}}
                                    @if ($movie['videos']['results'])
                                    <div class="relative overflow-hidden responsive-container"
                                    style="padding-top: 56.25%">
                                        <iframe class="absolute top-0 left-0 w-full h-full responsive-iframe"
                                        width="971" height="546"
                                        src="https://www.youtube.com/embed/{{$movie['videos']['results']['0']['key']}}"
                                            title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- End of video model --}}
                </div>
              {{-- End of trailer Wrapper --}}
            </div>
        </div>  {{-- end container --}}
    </div>
                {{-- start Movie cast  --}}
    <div class="movie-cast">
        <div class="container px-4 py-16 mx-auto">
            <h2 class="text-4xl font-semibold">Movie Cast</h2>
            <div class="grid grid-cols-1 gap-12 md:grid-cols-2 lg:grid-cols-6 :xl:grid-cols-6">
                {{-- Cast Start Card --}}
                @foreach ($movie['credits']['cast'] as $cast)
                @if ($loop->index < 6)
                   @if ($cast['profile_path'])
                <div class="mt-8 game">
                    <div class="relative inline-block">
                        <a href="{{route('actor.show', $cast['id'])}}">
                            <img src="{{'https://image.tmdb.org/t/p/w400/'.$cast['profile_path']}}" alt="Movie Actor" class="w-64 transition duration-150 ease-in-out hover:opacity-75 md:w-96">
                        </a>
                    </div>
                    <a href="{{route('actor.show', $cast['id'])}}" class="block mt-4 text-xl font-semibold leading-tight transition duration-200 ease-in-out hover:text-blue-500">
                       {{$cast['name']}}
                    </a>
                    <p class="text-sm text-gray-400">{{$cast['character']}}</p>
                </div>
                 @endif
                @else
                    @break
                @endif
                @endforeach
                 {{-- Cast End Card --}}
            </div>
        </div>
    </div>
    {{-- start images section --}}
    @if ($movie['images']['backdrops'])
    <div class="border-t border-gray-800 images" x-data="{isOpen: false, image: ''}">
        <div class="container px-4 py-16 mx-auto">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-1 gap-12 pt-10 Shots md:grid-cols-1 lg:grid-cols-3 :xl:grid-cols-4">
                @foreach ($movie['images']['backdrops'] as $image)
                @if ($loop->index < 9)
                <div class="mt-2 image">
                    <a href="#"
                    @click.prevent="
                    isOpen = true
                    image  = '{{'https://image.tmdb.org/t/p/original/'.$image['file_path']}}'
                    "
                    >
                        <img src="{{'https://image.tmdb.org/t/p/w400/'.$image['file_path']}}" alt="movie-shots" class="w-120">
                    </a>
                </div>
                @else
                    @break
                @endif
                @endforeach
            {{-- End images --}}
            </div>
            {{-- start of Image model --}}
            <div style="background-color: rgb(0, 0, 0, .5);"
            class="fixed top-0 left-0 z-50 flex items-center w-full h-full overflow-y-auto transition duration-300 ease-in-out shadow-lg"
            x-show="isOpen"
            >
                <div class="container mx-auto overflow-y-auto rounded-lg lg:px-32">
                    <div class="bg-gray-900">
                        <div class="flex justify-end pt-2 pr-4">
                            <button class="text-3xl loading-none hover:text-gray-300"
                            @click="isOpen = false"
                            @keydown.escape.window="isOpen = false"
                            @click.away="isOpen = false"
                            >&times;</button>
                        </div>
                        <div class="px-8 py-8 model-body">
                            {{-- Model Content --}}
                            <img :src="image" alt="poster">
                        </div>
                    </div>
                </div>
            </div>
            {{-- End of image model --}}
        </div>
        @endif
    </div>
    {{-- start of similar movies --}}
    <div class="border-b border-gray-600"></div>
    <div class="container px-4 mx-auto">
    <h2 class="pt-4 text-4xl font-semibold text-center uppercase">similar Movies</h2>
    <div class="grid grid-cols-1 gap-12 pb-10 text-sm popular-games md:grid-cols-2 lg:grid-cols-4 :xl:grid-cols-6">
        {{-- ^^^^^^^^ Grid System ^^^^^^^ --}}
        {{-- ˅˅˅˅˅˅˅ Childerns ˅˅˅˅˅ --}}
        @foreach ($similar as $similarMovie )

                @if ($similarMovie['poster_path'])
                <div class="mt-8 game">
                    <div class="relative inline-block">
                        <a href="{{route('movies.show', $similarMovie['id'])}}">
                            <img src="{{'https://image.tmdb.org/t/p/w500/'.$similarMovie['poster_path']}}" alt="Game Poser" class="transition duration-150 ease-in-out hover:opacity-75">
                        </a>
                        @if ($similarMovie['vote_average'] )
                        <div class="absolute bottom-0 right-0 bg-gray-800 rounded-full w-14 h-14"
                        style="right:-20px; bottom:-20px">
                            <div class="flex items-center justify-center h-full text-xs font-semibold text-yellow-400">
                                {{$similarMovie['vote_average'] * 10}}%</div>
                        </div>
                        @endif

                    </div>
                    <a href="{{route('movies.show', $similarMovie['id'])}}" class="block mt-4 text-base font-semibold leading-tight transition duration-200 ease-in-out hover:text-blue-500">
                        {{$similarMovie['title']}}
                        <p class="text-gray-300">{{\carbon\carbon::parse($movie['release_date'])->format('M d, Y')  }}</p>

                    </a>
                </div> {{-- End of the movie --}}
                @endif

        @endforeach
      </div>
    </div> {{-- end of similar Movies --}}

@endsection

@section('js')
    <script>
        $(document).ready(function(){
            // targted button
            $('body').on('click', ".FavMovie" , function(event){
                event.preventDefault();
                let id  = $(this).data('id');
                var url = "{{ route('Movies.Add', ':id') }}";
                var favButton = $(this);
                url     =   url.replace(':id',id);

                // console.log(url);
            $.ajaxSetup({
                headers:{
                    "_token": "{{ csrf_token() }}"
                }
            }),
            $.ajax({
            method:"GET",
            url: url,
            success: function (status) {
                        favButton.remove();
                        document.getElementById("QtyCount").innerHTML = " "+ status.Qty +" ";
                },
                error: function (XMLHttpRequest) {
                    if (XMLHttpRequest.status == 401) {
                        // unauthorized
                        window.location.href = '/login';
                    }
                }
            // Button end
            });
        });
    });
    </script>
@endsection

