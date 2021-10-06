@extends('layouts.app')

@section('content')
    <div class="container px-4 mx-auto">
        <h2 class="font-semibold tracking-wide text-blue-500 uppercase">Popular Movies</h2>
        <div class="grid grid-cols-1 gap-12 pb-10 text-sm border-b border-gray-800 popular-games md:grid-cols-2 lg:grid-cols-4 :xl:grid-cols-6">
            {{-- ^^^^^^^^ Grid System ^^^^^^^ --}}
            {{-- ˅˅˅˅˅˅˅ Childerns ˅˅˅˅˅ --}}
            @foreach ($movies as $movie )
            <div class="mt-8 game">
                <div class="relative inline-block">
                    <a href="{{route('movies.show', $movie['id'])}}" class="relative">
                        <img src="{{'https://image.tmdb.org/t/p/w500/'.$movie['poster_path']}}" alt="Game Poser" class="transition duration-150 ease-in-out hover:opacity-75">
                        <div class="absolute bottom-0 left-0" id="TEST" data-id="{{$movie['id']}}">
                                    <!-- Session Add to favorite -->
                                <a  href="#" class="p-2 text-gray-100 bg-gray-700 rounded-t-lg btn btn-danger">
                                     Add to favorite <i class="p-1 text-red-600 far fa-heart fa-1x"></i>
                                </a>
                        </div>
                    </a>
                    @if ($movie['vote_average'] )
                    <div class="absolute bottom-0 right-0 bg-gray-800 rounded-full w-14 h-14"
                    style="right:-20px; bottom:-20px">
                        <div class="flex items-center justify-center h-full text-xs font-semibold text-yellow-400">
                            {{$movie['vote_average'] * 10}}%</div>
                    </div>
                    @endif
                </div>
                <a href="{{route('movies.show', $movie['id'])}}" class="block mt-4 text-base font-semibold leading-tight transition duration-200 ease-in-out hover:text-blue-500">
                    {{$movie['title']}}
                </a>
                <div class="mt-1 text-gray-400">
                    @foreach ($movie['genre_ids'] as $genre)
                        {{$genres->get($genre) }}@if (!$loop->last), @endif
                    @endforeach
                </div>
                <p class="text-gray-300">{{\carbon\carbon::parse($movie['release_date'])->format('M d, Y')  }}</p>
            </div> {{-- End of the movie --}}
            @endforeach

        </div> {{-- end of Popular Movies --}}

     {{-- Second Section [recently Reviewd and Coming Soon] --}}
    <div class="flex flex-col my-10 lg:flex-row">
        <div class="w-full mr-0 recently-reviewd lg:w-3/4 lg:mr-32">          {{-- left Section --}}
            <h2 class="font-semibold tracking-wide text-blue-500 uppercase">top rated </h2>
            @foreach ($NowPlaying as $now)
            <div class="mt-8 space-y-12 recently-reviewd-container">
                {{-- Game Card --}}
                <div class="flex p-6 bg-gray-800 rounded-lg shadow-md game">
                    {{-- Card image --}}
                    <div class="relative flex-none">
                        <a href="{{route('movies.show', $now['id'])}}">
                            <img src="{{'https://image.tmdb.org/t/p/w400/'.$now['poster_path']}}" alt="Game Poser" class="w-48 transition duration-150 ease-in-out hover:opacity-75">
                        </a>
                        <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full"
                        style="right:-20px; bottom:-20px">
                        <div class="flex items-center justify-center h-full text-xs font-semibold text-yellow-400">
                            {{$now['vote_average'] * 10}}%</div>
                        </div>
                    </div>
                    <div class="ml-12">
                        <a href="{{route('movies.show', $now['id'])}}" class="block mt-2 text-lg font-semibold leading-tight transition duration-200 ease-in-out hover:text-blue-500">{{$now['title']}}</a>
                        <div class="mt-1 text-gray-400">
                            @foreach ($now['genre_ids'] as $genre)
                            {{$genres->get($genre) }}@if (!$loop->last),@endif
                            @endforeach
                        </div>
                        <p class="hidden mt-6 text-gray-300 game-desc lg:block">
                            {{$now['overview']}}
                        </p>
                        <div class="flex mt-10 text-green-400">
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
        <div class="mt-12 most-anticipated lg:mt-0 lg:w-1/4"> {{-- right section --}}
            <h2 class="font-semibold tracking-wide text-blue-500 uppercase">Latest Movies</h2>
            {{-- right game card--}}
            <div class="mt-8 space-y-10 most-anticipated-container">
                @foreach ($upcoming as $coming)
                    @if ($loop->index < 8)
                  <div class="flex game">
                    <a href="{{route('movies.show', $coming['id'])}}">
                        <img src="{{'https://image.tmdb.org/t/p/w200/'.$coming['poster_path']}}" alt="Game Poser" class="w-16 transition duration-150 ease-in-out hover:opacity-75">
                    </a>
                    <div class="ml-4">
                        <a href="{{route('movies.show', $coming['id'])}}" class="hover:text-gray-300">{{$coming['title']}}</a>
                        <div class="mt-1 text-sm text-gray-400">{{$coming['release_date']}}</div>
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

@section('js')
    <script>
        $(document).ready(function(){
            // targted button
            $('body').on('click', "#TEST" , function(event){
                event.preventDefault();
                let id  = $(this).data('id');
                var url = "{{ route('Movies.Add', ':id') }}";
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
                        document.getElementById("QtyCount").innerHTML = " "+ status.Qty +" ";
                        document.getElementById("TEST").removeChild(elem);
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
