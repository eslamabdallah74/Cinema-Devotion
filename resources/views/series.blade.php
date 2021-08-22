@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">popular Series</h2>
        <div class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 :xl:grid-cols-6 gap-12 border-b border-gray-800 pb-10">
            {{-- ^^^^^^^^ Grid System ^^^^^^^ --}}
            {{-- ˅˅˅˅˅˅˅ Childerns ˅˅˅˅˅ --}}
            @foreach ($series as $serie )
            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="{{route('showSeries.show', $serie['id'])}}">
                        <img src="{{'https://image.tmdb.org/t/p/w500/'.$serie['poster_path']}}" alt="Game Poser" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    @if ($serie['vote_average'] )
                    <div class="absolute bottom-0 right-0 w-14 h-14 bg-gray-800 rounded-full"
                    style="right:-20px; bottom:-20px">
                        <div class="font-semibold text-xs flex justify-center items-center h-full text-yellow-400">
                            {{$serie['vote_average'] * 10}}%</div>
                    </div>
                    @endif

                </div>
                <a href="{{route('showSeries.show', $serie['id'])}}" class="block text-base font-semibold leading-tight hover:text-blue-500 mt-4 transition ease-in-out duration-200">
                    {{$serie['name']}}
                </a>
                <p class="text-gray-300"> <span class="text-sm text-green-300 mr-1 capitalize">first air date</span>
                    {{\carbon\carbon::parse($serie['first_air_date'])->format('M d, Y')  }}</p>
            </div> {{-- End of the movie --}}
             @endforeach

        </div> {{-- end of Popular tv shows --}}
 {{-- Second Section [recently Reviewd and Coming Soon] --}}
 <div class="flex flex-col lg:flex-row md:my-10">
    <div class="recently-reviewd w-full lg:w-4/4 mr-0 lg:mr-32">          {{-- left Section --}}
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">top rated </h2>
        @foreach ($top_rated as $now)
        <div class="recently-reviewd-container space-y-12 mt-8">
            {{-- Game Card --}}
            <div class="game bg-gray-800 rounded-lg shadow-md flex p-6">
                {{-- Card image --}}
                <div class="relative flex-none">
                    <a href="{{route('showSeries.show', $now['id'])}}">
                        <img src="{{'https://image.tmdb.org/t/p/w400/'.$now['poster_path']}}" alt="Game Poser" class="w-48 hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full"
                    style="right:-20px; bottom:-20px">
                    <div class="font-semibold text-xs flex justify-center items-center h-full text-yellow-400">
                        {{$now['vote_average'] * 10}}%</div>
                    </div>
                </div>
                <div class="ml-2 md:ml-12">
                    <a href="{{route('showSeries.show', $now['id'])}}" class="block text-lg font-semibold leading-tight hover:text-blue-500 mt-2 transition ease-in-out duration-200">{{$now['name']}}</a>
                    <p class="game-desc mt-6 text-gray-300 hidden lg:block">
                        {{$now['overview']}}
                    </p>
                    <div class="mt-10 text-green-400 flex">
                        <div class="w-full lg:w-3/4">
                            <h5>Release date</h5>
                            <p class="text-gray-300">{{\carbon\carbon::parse($now['first_air_date'])->format('M d, Y')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="most-anticipated mt-12 lg:mt-0 lg:w-1/4"> {{-- right section --}}
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">on the air</h2>
        {{-- right game card--}}
        <div class="on-the-air-container space-y-10 mt-8">
            @foreach ($onTheAir as $air )
                @if ($loop->index < 10)
            <div class="game flex">
                <a href="{{route('showSeries.show', $air['id'])}}">
                    <img src="{{'https://image.tmdb.org/t/p/w200/'.$air['poster_path']}}" alt="Game Poser" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <div class="ml-4">
                    <a href="{{route('showSeries.show', $air['id'])}}" class="hover:text-gray-300">{{$air['name']}}</a>
                    <div class="text-gray-400 text-sm mt-1">{{$air['first_air_date']}}</div>
                </div>
            </div>
                @else
                    @break
                @endif
            @endforeach
        </div>
    </div>
@endsection
