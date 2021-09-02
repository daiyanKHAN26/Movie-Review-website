@extends('layouts.app')

@section('content')
<div class="container">
<main role="main">
  <div class="container">
  @if($movie)
    <div class="show-banner mb-5"  style="background-image:url({{asset('image/'.$movie->cover_image)}})">
        <h1>{{$movie->title}}</h1>
        <p>{{$movie->description}}</p>
        <div class="star-outer carousel-star">
            <div class="star-inner" data-rating={{App\Movie::calcRating($movie->id)}}></div>
        </div>
        <p><a href="{{url('/review/'.$movie->id)}}" class="btn btn-sm btn-primary">Give review</a></p>
    </div>
    
    <h1 class="mb-4">All Reviews</h1>
    @if(count($movie->reviews))
        @foreach($movie->reviews as $rev)
        <div class="card card-body mb-4">
            <h3 class="text-primary">{{$rev->user->name}}</h3>
            <div>
                <div class="star-outer carousel-star">
                    <div class="star-inner" data-rating={{$rev->rating}}></div>
                    
                </div>
                <span>{{$rev->rating}}</span>
            </div>
            <p> {{$rev->body}}</p>
        </div>
            
        @endforeach
    @else
    <div class="py-3 my-3 bg-light text-secondary text-center border-secondary" style="border:1px solid; border-radius:5px;">
        <p class="m-0">No reviews yet</p>
    </div>
    @endif
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
