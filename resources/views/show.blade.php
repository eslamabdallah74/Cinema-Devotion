@extends('layouts.app')

@section('content')
    <div class="movie-info">
        <div class="container mx-auto px-4 py-16 flex">
            <img src="{{asset('assets/gHolder.png')}}" class="w-96" alt="Movie Poser">
            <div class="ml-24">
                <h1 class="text-4xl font-semibold">
                    Movie name(2002)
                </h1>
                <div class="mt-1 flex text-gray-400">
                    <svg class="w-3" viewBox="0 0 24 24"><path d="M23.363 8.584l-7.378-1.127L12.678.413c-.247-.526-1.11-.526-1.357 0L8.015 7.457.637 8.584a.75.75 0 00-.423 1.265l5.36 5.494-1.267 7.767a.75.75 0 001.103.777L12 20.245l6.59 3.643a.75.75 0 001.103-.777l-1.267-7.767 5.36-5.494a.75.75 0 00-.423-1.266z" fill="#FFA500"/></svg>
                    <span class="mr-1 text-yellow-300">84%</span>
                    <span class="mx-1">|</span>
                    <span> Feb 20, 2002</span>
                    <span class="mx-1">|</span>
                    <span> Action, Horror</span>
                </div>
                <p class="mt-4 text-gray-300">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate iure eos amet in, incidunt asperiores sapiente eaque? Officia alias sequi, repudiandae, nihil nobis quaerat sed, fuga laborum velit molestias perspiciatis?
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate iure eos amet in, incidunt asperiores sapiente eaque? Officia alias sequi, repudiandae, nihil nobis quaerat sed, fuga laborum velit molestias perspiciatis?
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate iure eos amet in, incidunt asperiores sapiente eaque? Officia alias sequi, repudiandae, nihil nobis quaerat sed, fuga laborum velit molestias perspiciatis?
                </p>
                {{-- Movie Cast --}}
                <div class="mt-12">
                    <h4 class="text-white font-semibold"> <i class="fab fa-fort-awesome"></i> Featured Cast</h4>
                    <div class="flex mt-4">
                        <div>
                            <div>Bang Ho</div>
                            <div class="text-sm text-gray-400">Screen Play</div>
                        </div>
                        <div class="ml-8">
                            <div>Bang Ho</div>
                            <div class="text-sm text-gray-400">Screen Play</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
