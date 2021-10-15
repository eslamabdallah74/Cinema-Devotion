@extends('layouts.app')

@section('content')

    @if (Session::has('FavMovie'))
    <div class="container px-4 mx-auto mt-24">
        <h2 class="font-semibold tracking-wide text-blue-500 uppercase">Your Favorite Movies</h2>
        <div class="grid grid-cols-1 gap-12 pb-10 text-sm border-b border-gray-800 popular-games md:grid-cols-2 lg:grid-cols-4 :xl:grid-cols-6">
             @foreach ($favorites as $movie )
                <div class="mt-8 game">
                    <div class="relative inline-block">
                        <a href="{{route('movies.show', $movie['Movie']['id'])}}" class="relative">
                            <img src="{{'https://image.tmdb.org/t/p/w500/'.$movie['Movie']['poster_path']}}" alt="Game Poser" class="transition duration-150 ease-in-out hover:opacity-75">
                        </a>
                        @if ($movie['Movie']['vote_average'] )
                        <div class="absolute bottom-0 right-0 bg-gray-800 rounded-full w-14 h-14"
                        style="right:-20px; bottom:-20px">
                            <div class="flex items-center justify-center h-full text-xs font-semibold text-yellow-400">
                                {{$movie['Movie']['vote_average'] * 10}}%</div>
                        </div>
                        @endif
                    </div>
                    <a href="{{route('movies.show', $movie['Movie']['id'])}}" class="block mt-4 text-base font-semibold leading-tight transition duration-200 ease-in-out hover:text-blue-500">
                        {{ $movie['Movie']['title']}}
                    </a>

                    <p class="text-gray-300">{{\carbon\carbon::parse($movie['Movie']['release_date'])->format('M d, Y')  }}</p>
                </div> {{-- End of the movie --}}
                @endforeach
            </div>
    </div>
    @endif
@if (Session::has('FavSeries'))
<div class="container px-4 mx-auto mt-24">
    <h2 class="mt-10 font-semibold tracking-wide text-blue-500 uppercase">Your Favorite Series</h2>
    <div class="grid grid-cols-1 gap-12 pb-10 text-sm border-b border-gray-800 popular-games md:grid-cols-2 lg:grid-cols-4 :xl:grid-cols-6">
        @foreach ($favoriteSeries as $serie )
            <div class="mt-8 game">
                <div class="relative inline-block">
                    <a href="{{route('showSeries.show', $serie['Series']['id'])}}">
                        <img src="{{'https://image.tmdb.org/t/p/w500/'.$serie['Series']['poster_path']}}" alt="Game Poser" class="transition duration-150 ease-in-out hover:opacity-75">
                    </a>
                    @if ($serie['Series']['vote_average'] )
                    <div class="absolute bottom-0 right-0 bg-gray-800 rounded-full w-14 h-14"
                    style="right:-20px; bottom:-20px">
                        <div class="flex items-center justify-center h-full text-xs font-semibold text-yellow-400">
                            {{$serie['Series']['vote_average'] * 10}}%</div>
                    </div>
                    @endif
                </div>
                <a href="{{route('showSeries.show', $serie['Series']['id'])}}" class="block mt-4 text-base font-semibold leading-tight transition duration-200 ease-in-out hover:text-blue-500">
                    {{$serie['Series']['name']}}
                </a>
                <p class="text-gray-300"> <span class="mr-1 text-sm text-green-300 capitalize">first air date</span>
                    {{\carbon\carbon::parse($serie['Series']['first_air_date'])->format('M d, Y')  }}</p>
            </div> {{-- End of the movie --}}
        @endforeach
    </div>
</div>
 @endif


@endsection

@section('js')

@endsection
