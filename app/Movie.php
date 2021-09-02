<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{

    public static function calcRating($id){
        $movie = Movie::with('reviews')->where('id',$id)->first();
        $reviews = $movie->reviews;
        if(count($reviews)){
            $rating = 0;
            foreach($reviews as $rev){
                $rating+=$rev->rating;
            }
            return ($rating/count($reviews));
        }else{
            return 0;
        }

    }  
    public function reviews(){
        return $this->hasMany('App\Review');
    }
}
