<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class actorController extends Controller
{
    public function show($id)
    {

        $actor = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/person/'.$id.'?append_to_response=images')
        ->json();

        dump($actor);
        return view('/actor',
        [
        'actor' => $actor
        ]);
    }
}
