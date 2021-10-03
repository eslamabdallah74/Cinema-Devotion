<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\slice;

class actorController extends Controller
{
    public function show($id)
    {


        $actor = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/person/'.$id.'?append_to_response=images,movie_credits')
        ->json();

        $movies = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/person/'.$id.'?append_to_response=images,movie_credits')
        ->json('movie_credits');
        // dump($actor);
        return view('/actor',
        [
        'actor'     => $actor,
        'movies'    => $movies
        ]);
    }
}
