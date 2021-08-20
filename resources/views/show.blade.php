@extends('layouts.app')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 md:py-16 flex flex-col md:flex-row">
            <img src="{{'https://image.tmdb.org/t/p/w400/'.$movie['poster_path']}}" class="w-96" alt="Movie Poser">
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
                        @endif
                        @endforeach
                    </div>
                </div>
                {{-- button to trailer --}}
                @if (count($movie['videos']['results']) > 0)
                <div class="mt-10 mb-10 text-center md:text-left m:mb-0 ">
                    <a href="https://www.youtube.com/watch?v={{$movie['videos']['results']['0']['key']}}" target="_blank"
                     class="inline-flex
                     items-center bg-yellow-300
                    text-gray-900 rounded font-semibold px-5 py-4 hover:bg-yellow-500 transition ease-in-out duration-150">
                    <i class="fas fa-play"></i>
                    <span class="ml-2">Play Tralier</span>
                </a>
                </div>
                @endif
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
                        <a href="#">
                            <img src="{{'https://image.tmdb.org/t/p/w400/'.$cast['profile_path']}}" alt="Movie Actor" class="hover:opacity-75 transition ease-in-out duration-150 w-64 md:w-96">
                        </a>
                    </div>
                    <a href="#" target="_blank" class="block text-xl font-semibold leading-tight hover:text-blue-500 mt-4 transition ease-in-out duration-200">
                       {{$cast['name']}}
                    </a>
                    <p class="text-gray-400 text-sm">{{$cast['character']}}</p>
                </div>
                 @endif
                @endif
                @endforeach
                 {{-- Cast End Card --}}
            </div>
        </div>
    </div>
    {{-- start images section --}}
    <div class="images border-t border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="Shots grid grid-cols-1 md:grid-cols-1 lg:grid-cols-3 :xl:grid-cols-4 gap-12 pt-10">
                @foreach ($movie['images']['backdrops'] as $image)
                @if ($loop->index < 9)
                <div class="image mt-2">
                    <a href="#">
                        <img src="{{'https://image.tmdb.org/t/p/w400/'.$image['file_path']}}" alt="movie-shots" class="w-120">
                    </a>
                </div>
                @endif
                @endforeach
            {{--  --}}
            </div>
        </div>
    </div>

@endsection
