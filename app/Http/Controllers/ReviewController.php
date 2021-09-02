<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function create($movie_id){
        $movie = Movie::findOrFail($movie_id);
        return view('review',['movie'=>$movie]);
    }
    public function store(Request $request){
        $request->validate([
            'rating'=>'numeric|min:1|max:5|required',
            'body'=>'string|required'
        ]);
        $existingReview = Review::where('movie_id',$request->movie_id)
        ->where('user_id',$request->user()->id)->first();
        if($existingReview){
            $existingReview->body = $request->body;
            $existingReview->rating = $request->rating;
            $existingReview->save();
            return back()->with('success','Your had a previous review, we just override it with the new one!');
        }else{
            $review = new Review;
            $review->user_id = $request->user()->id;
            $review->movie_id = $request->movie_id;
            $review->body = $request->body;
            $review->rating = $request->rating;
            $review->save();
            return back()->with('success','Your review added successfully');
        }
      
    }


}
