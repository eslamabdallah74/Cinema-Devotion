@extends('layouts.app')

@section('content')

    @if (Session::has('FavMovie'))
    <div class="container px-4 mx-auto mt-24">
        <h2 class="font-semibold tracking-wide text-blue-500 uppercase">Your Favorite List</h2>
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


@endsection

@section('js')

@endsection
