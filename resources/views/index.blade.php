@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Popular Movies</h2>
        <div class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 :xl:grid-cols-6 gap-12 border-b border-gray-800 pb-10">
            {{-- ^^^^^^^^ Grid System ^^^^^^^ --}}
            {{-- ˅˅˅˅˅˅˅ Childerns ˅˅˅˅˅ --}}
            @foreach ($movies as $movie )
            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="{{route('movies.show', $movie['id'])}}">
                        <img src="{{'https://image.tmdb.org/t/p/w500/'.$movie['poster_path']}}" alt="Game Poser" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    @if ($movie['vote_average'] )
                    <div class="absolute bottom-0 right-0 w-14 h-14 bg-gray-800 rounded-full"
                    style="right:-20px; bottom:-20px">
                        <div class="font-semibold text-xs flex justify-center items-center h-full text-yellow-400">
                            {{$movie['vote_average'] * 10}}%</div>
                    </div>
                    @endif

                </div>
                <a href="{{route('movies.show', $movie['id'])}}" class="block text-base font-semibold leading-tight hover:text-blue-500 mt-4 transition ease-in-out duration-200">
                    {{$movie['title']}}
                </a>
                <div class="text-gray-400 mt-1">
                    @foreach ($movie['genre_ids'] as $genre)
                        {{$genres->get($genre) }}@if (!$loop->last), @endif
                    @endforeach
                </div>
                <p class="text-gray-300">{{\carbon\carbon::parse($movie['release_date'])->format('M d, Y')  }}</p>
            </div> {{-- End of the movie --}}
            @endforeach

        </div> {{-- end of Popular Movies --}}

     {{-- Second Section [recently Reviewd and Coming Soon] --}}
    <div class="flex flex-col lg:flex-row my-10">
        <div class="recently-reviewd w-full lg:w-3/4 mr-0 lg:mr-32">          {{-- left Section --}}
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">top rated </h2>
            @foreach ($NowPlaying as $now)
            <div class="recently-reviewd-container space-y-12 mt-8">
                {{-- Game Card --}}
                <div class="game bg-gray-800 rounded-lg shadow-md flex p-6">
                    {{-- Card image --}}
                    <div class="relative flex-none">
                        <a href="{{route('movies.show', $now['id'])}}">
                            <img src="{{'https://image.tmdb.org/t/p/w400/'.$now['poster_path']}}" alt="Game Poser" class="w-48 hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full"
                        style="right:-20px; bottom:-20px">
                        <div class="font-semibold text-xs flex justify-center items-center h-full text-yellow-400">
                            {{$now['vote_average'] * 10}}%</div>
                        </div>
                    </div>
                    <div class="ml-12">
                        <a href="{{route('movies.show', $now['id'])}}" class="block text-lg font-semibold leading-tight hover:text-blue-500 mt-2 transition ease-in-out duration-200">{{$now['title']}}</a>
                        <div class="text-gray-400 mt-1">
                            @foreach ($now['genre_ids'] as $genre)
                            {{$genres->get($genre) }}@if (!$loop->last),@endif
                            @endforeach
                        </div>
                        <p class="game-desc mt-6 text-gray-300 hidden lg:block">
                            {{$now['overview']}}
                        </p>
                        <div class="mt-10 text-green-400 flex">
                            <div class="w-full lg:w-3/4">
                                <h5>Release date</h5>
                                <p class="text-gray-300">{{\carbon\carbon::parse($now['release_date'])->format('M d, Y')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="most-anticipated mt-12 lg:mt-0 lg:w-1/4"> {{-- right section --}}
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Coming soon</h2>
            {{-- right game card--}}
            <div class="most-anticipated-container space-y-10 mt-8">
                @foreach ($upcoming as $coming)
                    @if ($loop->index < 8)
                  <div class="game flex">
                    <a href="{{route('movies.show', $coming['id'])}}">
                        <img src="{{'https://image.tmdb.org/t/p/w200/'.$coming['poster_path']}}" alt="Game Poser" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="ml-4">
                        <a href="{{route('movies.show', $coming['id'])}}" class="hover:text-gray-300">{{$coming['title']}}</a>
                        <div class="text-gray-400 text-sm mt-1">{{$coming['release_date']}}</div>
                    </div>
                </div>
                    @else
                        @break
                    @endif
                @endforeach
            </div>
            </div>
        </div> {{-- end of right section --}}

    </div>
</div> {{-- End of contaier --}}
@endsection
