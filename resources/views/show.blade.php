@extends('layouts.app')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 md:py-16 flex flex-col md:flex-row">
            @if ($movie['poster_path'])
            <img src="{{'https://image.tmdb.org/t/p/w400/'.$movie['poster_path']}}" class="w-96" alt="Movie Poser">
            @else
            <img src="https://via.placeholder.com/250x100" class="w-96" alt="Poster Holder">
            @endif
            <div class="mt-6 md:ml-24">
                <span class="text-2xl md:text-4xl font-semibold shadow-md bg-black-400 text-white-900 rounded px-2 py-1 text-center ">
                   {{$movie['title']}}
                </span>
                <div class="mt-3 flex text-gray-400 flex-wrap">
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
                    <h4 class="text-white font-semibold"> <i class="fab fa-fort-awesome text-yellow-300"></i> Featured Cast</h4>
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
                        class="inline-flex
                        items-center bg-yellow-300
                        text-gray-900 rounded font-semibold px-5 py-4 hover:bg-yellow-500 transition ease-in-out duration-150">
                        <i class="fas fa-play"></i>
                        <span class="ml-2">Play Tralier</span>
                         </button>
                    </div>
                    @else
                    {{-- Trailer not available --}}
                    <div class="mt-10 mb-10 text-center md:text-left m:mb-0 ">
                        <a href="#"
                        class="inline-flex
                        items-center bg-red-300
                        text-gray-900 rounded font-semibold px-5 py-4 hover:bg-red-500 transition ease-in-out duration-150">
                        <span class="ml-2">Sorry tralier is not available</span>
                    </a>
                    </div>
                    @endif
                        {{-- start of video model --}}
                    <div style="background-color: rgb(0, 0, 0, .5);"
                    class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto z-50"
                    x-show="isOpen"
                    >
                        <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                            <div class="bg-gray-900">
                                <div class="flex justify-end pr-4 pt-2">
                                    <button class="text-3xl loading-none hover:text-gray-300"
                                    @click="isOpen = false"
                                    @keydown.escape.window="isOpen = false"
                                    @click.away="isOpen = false"
                                    >&times;</button>
                                </div>
                                <div class="model-body px-8 py-8">
                                    {{-- Model Content --}}
                                    @if ($movie['videos']['results'])
                                    <div class="responsive-container overflow-hidden relative"
                                    style="padding-top: 56.25%">
                                        <iframe class="responsive-iframe absolute top-0 left-0 w-full h-full"
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
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Movie Cast</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 :xl:grid-cols-6 gap-12">
                {{-- Cast Start Card --}}
                @foreach ($movie['credits']['cast'] as $cast)
                @if ($loop->index < 6)
                   @if ($cast['profile_path'])
                <div class="game mt-8">
                    <div class="relative inline-block">
                        <a href="{{route('actor.show', $cast['id'])}}">
                            <img src="{{'https://image.tmdb.org/t/p/w400/'.$cast['profile_path']}}" alt="Movie Actor" class="hover:opacity-75 transition ease-in-out duration-150 w-64 md:w-96">
                        </a>
                    </div>
                    <a href="{{route('actor.show', $cast['id'])}}" class="block text-xl font-semibold leading-tight hover:text-blue-500 mt-4 transition ease-in-out duration-200">
                       {{$cast['name']}}
                    </a>
                    <p class="text-gray-400 text-sm">{{$cast['character']}}</p>
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
    <div class="images border-t border-gray-800" x-data="{isOpen: false, image: ''}">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="Shots grid grid-cols-1 md:grid-cols-1 lg:grid-cols-3 :xl:grid-cols-4 gap-12 pt-10">
                @foreach ($movie['images']['backdrops'] as $image)
                @if ($loop->index < 9)
                <div class="image mt-2">
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
            class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto z-50 transition ease-in-out duration-300"
            x-show="isOpen"
            >
                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                    <div class="bg-gray-900">
                        <div class="flex justify-end pr-4 pt-2">
                            <button class="text-3xl loading-none hover:text-gray-300"
                            @click="isOpen = false"
                            @keydown.escape.window="isOpen = false"
                            @click.away="isOpen = false"
                            >&times;</button>
                        </div>
                        <div class="model-body px-8 py-8">
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
    <div class="container mx-auto px-4">
    <h2 class="text-4xl font-semibold text-center pt-4 uppercase">similar Movies</h2>
    <div class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 :xl:grid-cols-6 gap-12 pb-10">
        {{-- ^^^^^^^^ Grid System ^^^^^^^ --}}
        {{-- ˅˅˅˅˅˅˅ Childerns ˅˅˅˅˅ --}}
        @foreach ($similar as $similarMovie )

                @if ($similarMovie['poster_path'])
                <div class="game mt-8">
                    <div class="relative inline-block">
                        <a href="{{route('movies.show', $similarMovie['id'])}}">
                            <img src="{{'https://image.tmdb.org/t/p/w500/'.$similarMovie['poster_path']}}" alt="Game Poser" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        @if ($similarMovie['vote_average'] )
                        <div class="absolute bottom-0 right-0 w-14 h-14 bg-gray-800 rounded-full"
                        style="right:-20px; bottom:-20px">
                            <div class="font-semibold text-xs flex justify-center items-center h-full text-yellow-400">
                                {{$similarMovie['vote_average'] * 10}}%</div>
                        </div>
                        @endif

                    </div>
                    <a href="{{route('movies.show', $similarMovie['id'])}}" class="block text-base font-semibold leading-tight hover:text-blue-500 mt-4 transition ease-in-out duration-200">
                        {{$similarMovie['title']}}
                        <p class="text-gray-300">{{\carbon\carbon::parse($movie['release_date'])->format('M d, Y')  }}</p>

                    </a>
                </div> {{-- End of the movie --}}
                @endif

        @endforeach
      </div>
    </div> {{-- end of similar Movies --}}

@endsection
