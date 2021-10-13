<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FavoriteController extends Controller
{
    public function index()
    {
        if(Session::has('FavMovie'))
        {
            $favorites = Session::get('FavMovie')->items;
            return view('favorite',compact('favorites'));
        }
            return redirect()->back();

    }
}
