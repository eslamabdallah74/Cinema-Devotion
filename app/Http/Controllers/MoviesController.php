<?php

namespace App\Http\Controllers;

use App\Models\FavMovie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
// to get all kind of endpoint
use MarcReichel\IGDBLaravel\Builder as IGDB;


use MarcReichel\IGDBLaravel\Models\Game;
use MarcReichel\IGDBLaravel\Models\Cover;
use MarcReichel\IGDBLaravel\Models\Screenshots;


class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // dump(Session::get('FavMovie'));
        // session()->push('Name', 'Eslam abdallah');
        // dd(Session::get('FavMovie'));
        // HTTP
        $movies = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/popular')
        ->json()['results'];


        $NowPlaying = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/top_rated')
        ->json()['results'];

        $genresArray = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/genre/movie/list')
        ->json()['genres'];

        $genres = collect($genresArray)->mapWithKeys(function ($genre){
            return [$genre['id'] => $genre['name']];
        });


        $tvShows = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/trending/tv/week')
        ->json()['results'];

        $Tvgenres = collect($tvShows)->mapWithKeys(function ($genre){
            return [$genre['id'] => $genre['name']];
        });

        $upcoming = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/upcoming')
        ->json()['results'];

        // dd(Session::all());

        return view('index',[
            'movies'     => $movies,
            'NowPlaying' => $NowPlaying,
            'genres'     => $genres,
            'tvShows'    => $tvShows,
            'Tvgenres'   => $Tvgenres,
            'upcoming'   => $upcoming
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

        $findMovie = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=credits,videos,images')
        ->json();

        $oldFav    = Session::has('FavMovie') ? Session::get('FavMovie') : null;

        $FavMovie  = new FavMovie($oldFav);

        $FavMovie->add($findMovie,$findMovie['id']);

        $StoredMovie =    $request->session()->put('FavMovie',$FavMovie);

        $Qty  =   Session::get('FavMovie')->totalQty;

        return response()->json([$StoredMovie => true,'Qty'=>$Qty]);
        // Session::forget('FavMovie');
        // dd($request->session()->all());

        return redirect()->route('movies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=credits,videos,images')
        ->json();

        $similar = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/'.$id.'/similar')
        ->json('results');

        return view('show',
        [
         'movie'    => $movie,
         'similar'  =>$similar
        ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
