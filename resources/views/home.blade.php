@extends('layouts.app')

@section('content')
<div class="container">
<main role="main">
    @if($movies)
    
    <h1>Trending Movies</h1>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach($movies as $index=>$movie)
             <li data-target="#myCarousel" data-slide-to="{{$index}}" class=""></li>
        @endforeach
    </ol>
    <div class="carousel-inner">
  
        @foreach($movies as $index=>$movie)
            @php($overallRating  = App\Movie::calcRating($movie->id))
            <div class="carousel-item {{$index==0?'active':''}}">
                <img src="{{asset('image/'.$movie->cover_image)}}" alt="" class="d-block w-100">
                <div class="container">
                <div class="carousel-caption text-left">
                    <h1>{{$movie->title}}</h1>
                    <p class="desc">{{$movie->description}}</p>
                    <div class="star-outer carousel-star">
                        <div class="star-inner" data-rating={{$overallRating}}></div>
                        
                    </div>
                    <span class="text-white">{{$overallRating!=0?$overallRating:'No reviews yet'}}</span>
                    <p><a class="btn btn-primary" href="{{url('/review/'.$movie->id)}}" role="button">Give Your review</a>
                    <a class="btn btn-danger" href="{{url('/movie/show/'.$movie->id)}}" role="button">See reviews</a></p>
                </div>
                </div>
            </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
@endif
<div class="album py-5 bg-light">
    @if($movies)
    <h1>All Movies</h1>

    <div class="row">
    @foreach($movies as $movie)
    @php($overallRating  = App\Movie::calcRating($movie->id))
      <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
            <div class="movie-image-parent">
                <img src="{{asset('image/'.$movie->poster_image)}}" alt="" class="bd-placeholder-img card-img-top" width="100%" >
            </div>
            
          <div class="card-body">
            <h3>{{$movie->title}}</h3>  
            <p class="card-text">{{str_limit($movie->description,50)}}</p>
            <div class="">
            <div class="star-outer carousel-star">
                <div class="star-inner" data-rating={{$overallRating}}></div>
                
            </div>
            <span>{{$overallRating!=0?$overallRating:'No reviews yet'}}</span>
            <div>
            <a href="{{url('/review/'.$movie->id)}}" class="btn btn-sm btn-primary">Give review</a>
            <a href="{{url('/movie/show/'.$movie->id)}}" class="btn btn-sm btn-danger">See reviews</a>
            </div>
            
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
 
</div>
@endif

</main>

<footer class="text-muted">
<div class="container">
  <p class="float-right">
    <a href="#">Back to top</a>
  </p>
  <p> &copy; Your Company</p>
</div>
</div>
@endsection
