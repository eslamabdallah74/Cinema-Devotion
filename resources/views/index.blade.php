@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Popular Games</h2>
        <div class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 :xl:grid-cols-6 gap-12 border-b border-gray-800 pb-10">
            {{-- ^^^^^^^^ Grid System ^^^^^^^ --}}
            {{-- ˅˅˅˅˅˅˅ Childerns ˅˅˅˅˅ --}}
            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="{{asset("assets/gHolder.png")}}" alt="Game Poser" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                    style="right:-20px; bottom:-20px">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">80&</div>
                    </div>

                </div>
                <a href="#" class="block text-base font-semibold leading-tight hover:text-blue-500 mt-4 transition ease-in-out duration-200">
                    Game Name
                </a>
                <div class="text-gray-400 mt-1">GameTag</div>
            </div> {{-- End of the game --}}
            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="{{asset("assets/gHolder.png")}}" alt="Game Poser" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                    style="right:-20px; bottom:-20px">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">80&</div>
                    </div>

                </div>
                <a href="#" class="block text-base font-semibold leading-tight hover:text-blue-500 mt-4 transition ease-in-out duration-200">
                    Game Name
                </a>
                <div class="text-gray-400 mt-1">GameTag</div>
            </div> {{-- End of the game --}}            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="{{asset("assets/gHolder.png")}}" alt="Game Poser" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                    style="right:-20px; bottom:-20px">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">80&</div>
                    </div>

                </div>
                <a href="#" class="block text-base font-semibold leading-tight hover:text-blue-500 mt-4 transition ease-in-out duration-200">
                    Game Name
                </a>
                <div class="text-gray-400 mt-1">GameTag</div>
            </div> {{-- End of the game --}}            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="{{asset("assets/gHolder.png")}}" alt="Game Poser" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                    style="right:-20px; bottom:-20px">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">80&</div>
                    </div>

                </div>
                <a href="#" class="block text-base font-semibold leading-tight hover:text-blue-500 mt-4 transition ease-in-out duration-200">
                    Game Name
                </a>
                <div class="text-gray-400 mt-1">GameTag</div>
            </div> {{-- End of the game --}}            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="{{asset("assets/gHolder.png")}}" alt="Game Poser" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                    style="right:-20px; bottom:-20px">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">80&</div>
                    </div>
                </div>
                <a href="#" class="block text-base font-semibold leading-tight hover:text-blue-500 mt-4 transition ease-in-out duration-200">
                    Game Name
                </a>
                <div class="text-gray-400 mt-1">GameTag</div>
            </div> {{-- End of the game --}}
        </div> {{-- end of Popular Games --}}

     {{-- Second Section [recently Reviewd and Coming Soon] --}}
    <div class="flex flex-col lg:flex-row my-10">
        <div class="recently-reviewd w-full lg:w-3/4 mr-0 lg:mr-32">          {{-- left Section --}}
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">recently reviewd</h2>
            <div class="recently-reviewd-container space-y-12 mt-8">
                {{-- Game Card --}}
                <div class="game bg-gray-800 rounded-lg shadow-md flex p-6">
                    {{-- Card image --}}
                    <div class="relative flex-none">
                        <a href="#">
                            <img src="{{asset("assets/gHolder.png")}}" alt="Game Poser" class="w-48 hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full"
                        style="right:-20px; bottom:-20px">
                            <div class="font-semibold text-xs flex justify-center items-center h-full">80&</div>
                        </div>
                    </div>
                    <div class="ml-12">
                        <a href="#" class="block text-lg font-semibold leading-tight hover:text-blue-500 mt-2 transition ease-in-out duration-200">Game Name</a>
                        <div class="text-gray-400 mt-1">Game Tag</div>
                        <p class="game-desc mt-6 text-gray-300 hidden lg:block">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque laboriosam ut, sed minima placeat atque doloribus distinctio soluta earum, ipsam natus corporis delectus et consectetur in optio sunt impedit accusantium!
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="most-anticipated mt-12 lg:mt-0 lg:w-1/4"> {{-- right section --}}
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">most anticipated</h2>
            {{-- right game card--}}
            <div class="most-anticipated-container space-y-10 mt-8">
                <div class="game flex">
                    <a href="#">
                        <img src="{{asset("assets/gHolder.png")}}" alt="Game Poser" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="ml-4">
                        <a href="#" class="hover:text-gray-300">Game Name</a>
                        <div class="text-gray-400 text-sm mt-1">sept 16, 2018</div>
                    </div>
                </div>
            </div>
            {{-- right game card--}}
            <div class="most-anticipated-container space-y-10 mt-8">
                <div class="game flex">
                    <a href="#">
                        <img src="{{asset("assets/gHolder.png")}}" alt="Game Poser" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="ml-4">
                        <a href="#" class="hover:text-gray-300">Game Name</a>
                        <div class="text-gray-400 text-sm mt-1">sept 16, 2018</div>
                    </div>
                </div>
            </div>
            <div class="coming-soon pt-4 border-t mt-4 border-gray-400">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Coming soon</h2>
            {{-- right game card--}}
            <div class="most-anticipated-container space-y-10 mt-8">
                <div class="game flex">
                    <a href="#">
                        <img src="{{asset("assets/gHolder.png")}}" alt="Game Poser" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="ml-4">
                        <a href="#" class="hover:text-gray-300">Game Name</a>
                        <div class="text-gray-400 text-sm mt-1">sept 16, 2018</div>
                    </div>
                </div>
            </div>
            </div>
        </div> {{-- end of right section --}}
        
    </div>
</div> {{-- End of contaier --}}
@endsection
