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

        </div> {{-- end of Popular Movies --}}
@endsection
