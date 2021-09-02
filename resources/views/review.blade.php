@extends('layouts.app')

@section('content')
<div class="container">
<main role="main">
  <div class="row">
    <div class="col-md-8">
      <form action="{{url('/review/store')}}" method="POST">
      @csrf
      <h1>Write Your review on: <span class="text-primary">{{$movie->title}} </span></h1>
      <input type="hidden" name="movie_id" value="{{$movie->id}}">
      <div class="form-group">
        <label class="font-weight-bold">Rating in number:(1-5)</label>
        <input type="number" step="0.1" name="rating" placeholder="e.g: 4.3" class="form-control @error('rating') is-invalid @enderror" value="{{old('rating')}}">
          @error('rating')
          <span class="invalid-feedback" role="alert">
          <strong>{{$message}}</strong>
          </span>
          @enderror
      </div>
      <div class="form-group">
        <label class="font-weight-bold">Review in words:</label>
        <textarea class="form-control @error('body') is-invalid @enderror" placeholder="Write your review" name="body" rows=10>{{old('body')}}</textarea>
        @error('body')
          <span class="invalid-feedback" role="alert">
          <strong>{{$message}}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-success">Submit review</button>
      
      </div>
   </form>
    </div>
    <div class="col-md-4">
      <div class="card mb-4 shadow-sm">
            <div class="movie-image-parent">
                <img src="{{asset('image/'.$movie->poster_image)}}" alt="" class="bd-placeholder-img card-img-top" width="100%" >
            </div>
            
          <div class="card-body">
            <h3>{{$movie->title}}</h3>  
            <p class="card-text">{{$movie->description}}</p>
            <div class="">
            <div class="star-outer carousel-star">
                <div class="star-inner" data-rating=3.5></div>
            </div>
          </div>
        </div>
    </div>
  </div>
   
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
