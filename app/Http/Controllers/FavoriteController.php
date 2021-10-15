<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FavoriteController extends Controller
{
    public function index()
    {
        if(Session::has('FavMovie') && Session::has('FavSeries'))
        {
            $favorites      = Session::get('FavMovie')->items;
            $favoriteSeries = Session::get('FavSeries')->items;
            return view('favorite',compact('favorites','favoriteSeries'));
        } elseif (Session::has('FavMovie'))
        {
            $favorites      = Session::get('FavMovie')->items;
            return view('favorite',compact('favorites'));
        } elseif(Session::has('FavSeries'))
        {
            $favoriteSeries = Session::get('FavSeries')->items;
            return view('favorite',compact('favoriteSeries'));

        }
            return redirect()->back();

    }
}
