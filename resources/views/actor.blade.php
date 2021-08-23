@extends('layouts.app')

@section('content')
<div class="movie-info border-b border-gray-800">
    <div class="container mx-auto px-4 md:py-16 flex flex-col md:flex-row">
        @if ($actor['profile_path'])
        <img src="{{'https://image.tmdb.org/t/p/w400'.$actor['profile_path']}}" class="w-96" alt="Movie Poser">
        @else
        <img src="https://via.placeholder.com/250x100" class="w-96" alt="Poster Holder">
        @endif
        <div class="mt-6 md:ml-24">
            <span class="text-2xl md:text-4xl font-semibold shadow-md bg-black-400 text-white-900 rounded px-2 py-1 text-center ">
                @if ($actor['homepage'])
                <a href="{{$actor['homepage']}}" target="_blank">{{$actor['name']}} </span></a>
                @else
                {{$actor['name']}}
                @endif
            </span>
            <div class="mt-3 flex text-gray-400 flex-wrap">
                <svg class="w-3" viewBox="0 0 24 24"><path d="M23.363 8.584l-7.378-1.127L12.678.413c-.247-.526-1.11-.526-1.357 0L8.015 7.457.637 8.584a.75.75 0 00-.423 1.265l5.36 5.494-1.267 7.767a.75.75 0 001.103.777L12 20.245l6.59 3.643a.75.75 0 001.103-.777l-1.267-7.767 5.36-5.494a.75.75 0 00-.423-1.266z" fill="#FFA500"/></svg>
                <span class="text-yellow-300">{{$actor['popularity']}}</span>
                <span class="mx-1">|</span>
                <span> <i class="fas fa-birthday-cake"></i> {{\carbon\carbon::parse($actor['birthday'])->format('M d, Y')  }}</span>
                <span class="mx-1">|</span>
                <span><i class="fas fa-city"></i> {{$actor['place_of_birth']}}</span>
                <span class="mx-1">|</span>
                <span>{{$actor['known_for_department']}}
            </div>
            <p class="mt-4 text-gray-300 max-h-96 overflow-hidden">
                {{$actor['biography']}}
            </p>
            </div>
        </div>
        {{-- Start Images Section --}}
    <div class="images border-t border-gray-800" x-data="{isOpen: false, image: ''}">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold text-center">Images</h2>
            <div class="Shots grid grid-cols-1 md:grid-cols-1 lg:grid-cols-3 :xl:grid-cols-4 gap-12 pt-10">
                @foreach ($actor['images']['profiles'] as $image)
                @if ($loop->index < 9)
                <div class="image mt-2">
                    <a href="#"
                    @click.prevent="
                    isOpen = true
                    image  = '{{'https://image.tmdb.org/t/p/w300/'.$image['file_path']}}'
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
                            <img class="mx-auto" :src="image" alt="poster">
                            <h6 class="text-center pt-2">{{$actor['name']}}</h6>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End of image model --}}
        </div>

        {{-- Other Movies --}}
        @if ($movies)
        <div class="border-b border-gray-600"></div>
        <div class="container mx-auto px-4">
        <h2 class="text-4xl font-semibold text-center pt-4">Other Movies</h2>
        <div class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 :xl:grid-cols-6 gap-12 pb-10">
            {{-- ^^^^^^^^ Grid System ^^^^^^^ --}}
            {{-- ˅˅˅˅˅˅˅ Childerns ˅˅˅˅˅ --}}
            @foreach ($movies['cast'] as $actorMovie )
                @if ($loop->index <= 50)
                    @if ($actorMovie['poster_path'])
                    <div class="game mt-8">
                        <div class="relative inline-block">
                            <a href="{{route('movies.show', $actorMovie['id'])}}">
                                <img src="{{'https://image.tmdb.org/t/p/w500/'.$actorMovie['poster_path']}}" alt="Game Poser" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            @if ($actorMovie['vote_average'] )
                            <div class="absolute bottom-0 right-0 w-14 h-14 bg-gray-800 rounded-full"
                            style="right:-20px; bottom:-20px">
                                <div class="font-semibold text-xs flex justify-center items-center h-full text-yellow-400">
                                    {{$actorMovie['vote_average'] * 10}}%</div>
                            </div>
                            @endif

                        </div>
                        <a href="{{route('movies.show', $actorMovie['id'])}}" class="block text-base font-semibold leading-tight hover:text-blue-500 mt-4 transition ease-in-out duration-200">
                            {{$actorMovie['title']}}
                        </a>
                    </div> {{-- End of the movie --}}
                    @endif
                @endif
            @endforeach
          </div>
          @endif
        </div> {{-- end of Popular Movies --}}

        {{-- End of section --}}
</div>
@endsection
