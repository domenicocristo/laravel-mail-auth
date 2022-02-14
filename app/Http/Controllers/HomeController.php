<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Videogame;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home() {
        $videogames = Videogame::all();

        return view('pages.home', compact('videogames'));
    }
}