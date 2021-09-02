<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

      
     
    public function index()
    {
        $movies = Movie::all();
        return view('home',['movies'=>$movies]);
    }
    public function show($id){
        $movie = Movie::with('reviews')->where('id',$id)->first();
        return view('show',['movie'=>$movie]);
    }
    
}
