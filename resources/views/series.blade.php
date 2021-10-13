@extends('layouts.app')

@section('content')
    <div class="container px-4 mx-auto">
        <h2 class="font-semibold tracking-wide text-blue-500 uppercase">popular Series</h2>
        <div class="grid grid-cols-1 gap-12 pb-10 text-sm border-b border-gray-800 popular-games md:grid-cols-2 lg:grid-cols-4 :xl:grid-cols-6">
            {{-- ^^^^^^^^ Grid System ^^^^^^^ --}}
            {{-- ˅˅˅˅˅˅˅ Childerns ˅˅˅˅˅ --}}
            @foreach ($series as $serie )
            <div class="mt-8 game">
                <div class="relative inline-block">
                    <a href="{{route('showSeries.show', $serie['id'])}}">
                        <img src="{{'https://image.tmdb.org/t/p/w500/'.$serie['poster_path']}}" alt="Game Poser" class="transition duration-150 ease-in-out hover:opacity-75">
                    </a>
                    @if ($serie['vote_average'] )
                    <div class="absolute bottom-0 right-0 bg-gray-800 rounded-full w-14 h-14"
                    style="right:-20px; bottom:-20px">
                        <div class="flex items-center justify-center h-full text-xs font-semibold text-yellow-400">
                            {{$serie['vote_average'] * 10}}%</div>
                    </div>
                    @endif
                </div>
                <a href="{{route('showSeries.show', $serie['id'])}}" class="block mt-4 text-base font-semibold leading-tight transition duration-200 ease-in-out hover:text-blue-500">
                    {{$serie['name']}}
                </a>
                <p class="text-gray-300"> <span class="mr-1 text-sm text-green-300 capitalize">first air date</span>
                    {{\carbon\carbon::parse($serie['first_air_date'])->format('M d, Y')  }}</p>
            </div> {{-- End of the movie --}}
             @endforeach

        </div> {{-- end of Popular tv shows --}}
 {{-- Second Section [recently Reviewd and Coming Soon] --}}
 <div class="flex flex-col lg:flex-row md:my-10">
    <div class="w-full mr-0 recently-reviewd lg:w-4/4 lg:mr-32">          {{-- left Section --}}
        <h2 class="font-semibold tracking-wide text-blue-500 uppercase">top rated </h2>
        @foreach ($top_rated as $now)
        <div class="mt-8 space-y-12 recently-reviewd-container">
            {{-- Game Card --}}
            <div class="flex p-6 bg-gray-800 rounded-lg shadow-md game">
                {{-- Card image --}}
                <div class="relative flex-none">
                    <a href="{{route('showSeries.show', $now['id'])}}">
                        <img src="{{'https://image.tmdb.org/t/p/w400/'.$now['poster_path']}}" alt="Game Poser" class="w-48 transition duration-150 ease-in-out hover:opacity-75">
                    </a>
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full"
                    style="right:-20px; bottom:-20px">
                    <div class="flex items-center justify-center h-full text-xs font-semibold text-yellow-400">
                        {{$now['vote_average'] * 10}}%</div>
                    </div>
                </div>
                <div class="ml-2 md:ml-12">
                    <a href="{{route('showSeries.show', $now['id'])}}" class="block mt-2 text-lg font-semibold leading-tight transition duration-200 ease-in-out hover:text-blue-500">{{$now['name']}}</a>
                    <p class="hidden mt-6 text-gray-300 game-desc lg:block">
                        {{$now['overview']}}
                    </p>
                    <div class="flex mt-10 text-green-400">
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
    <div class="mt-12 most-anticipated lg:mt-0 lg:w-1/4"> {{-- right section --}}
        <h2 class="font-semibold tracking-wide text-blue-500 uppercase">on the air</h2>
        {{-- right game card--}}
        <div class="mt-8 space-y-10 on-the-air-container">
            @foreach ($onTheAir as $air )
                @if ($loop->index < 10)
            <div class="flex game">
                <a href="{{route('showSeries.show', $air['id'])}}">
                    <img src="{{'https://image.tmdb.org/t/p/w200/'.$air['poster_path']}}" alt="Game Poser" class="w-16 transition duration-150 ease-in-out hover:opacity-75">
                </a>
                <div class="ml-4">
                    <a href="{{route('showSeries.show', $air['id'])}}" class="hover:text-gray-300">{{$air['name']}}</a>
                    <div class="mt-1 text-sm text-gray-400">{{$air['first_air_date']}}</div>
                </div>
            </div>
                @else
                    @break
                @endif
            @endforeach
        </div>
    </div>
@endsection
