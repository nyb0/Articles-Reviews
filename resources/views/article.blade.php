@extends('tempale')

@section('content')
  <div class="article">            
    <h1>{{ $articles->headline }}</h1>

    <div class="title">
        <div class="current-rating">
            <h2>TOTAL RATING: <span>{{ $articles->comments->find(1)->grade }}</span> </h2>
            
            <div class="rate-stars">
                <span></span>
            </div>

            <a href="">CLICK TO LEAVE FEEDBACK</a>
        </div>
    </div>

    <p>{{ $articles->article_body }}</p>
    
    <div class="article-data">
      <h3>Author: {{ $articles->user->name }}</h3>
      <h3>{{ $articles->created_at }}</h3>
    </div>
</div>
@endsection