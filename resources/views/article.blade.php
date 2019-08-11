@extends('tempale')

@section('content')
  <div class="article">            
    <h1>{{ $articles->headline }}</h1>
    
    <div class="title">
        <div class="current-rating">
            <h2>TOTAL RATING: <span data-grade='{{ $comments->avgGrade }}'>{{ $comments->avgGrade }}</span> </h2>
            <div class="rate-stars">
                <span class="grade-stars"></span>
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
@append

@section('feedback')

<h1>COMMENTS</h1>
                        
  <div class="add-review">
      <div class="close-form">
          <p>Add Comment</p>
          <img src="{{ asset('storage/images/to_close.png') }}" alt="Close">
      </div>

      <form method="post" enctype="multipart/form-data" action="{{ route('add-comment') }}">
          @csrf
          <input type="hidden" name="article_id" value="{{ $articles->id }}">
          @guest
            <input name="is_registered" type="hidden" value="0">
            <div class="name">
                <label for="name">NAME:</label>
                <input id="name" type="text" class="@error('name') @enderror" name="name" value="{{ old('name') }}" autocomplete="name" placeholder="Enter your name">
                @error('name')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="email">
                <label for="email">EMAIL:</label>
                <input id="email" type="email" class="@error('email') @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Enter your email">
                @error('email')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            @else
              <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
          @endguest
          <div class="rating">
              <label>Give your grade:</label>
              <div class="rate-stars">
                  <input type="radio" class="@error('grade') @enderror" name="grade" id="star-1" value="1">
                  <label for="star-1" class="star-1">1</label>
                  <input type="radio" class="@error('grade') @enderror" name="grade" id="star-2" value="2">
                  <label for="star-2" class="star-2">2</label>
                  <input type="radio" class="@error('grade') @enderror" name="grade" id="star-3" value="3">
                  <label for="star-3" class="star-3">3</label>
                  <input type="radio" class="@error('grade') @enderror" name="grade" id="star-4" value="4">
                  <label for="star-4" class="star-4">4</label>
                  <input type="radio" class="@error('grade') @enderror" name="grade" id="star-5" value="5">
                  <label for="star-5" class="star-5">5</label>
                  <span class="grade-stars"></span>
              </div>
              @error('grade')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>

          <div class="comment-message">    
              <label for="comment-message">Feedback message:</label>
              <textarea class="@error('comment_message') @enderror" name="comment_message" id="comment-message" placeholder="Leave your feedback"></textarea>
              @error('comment_message')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>

          @auth    
          <div class="image">
            <span>Add image:</span>
            <label for="image">
              <img src="{{ asset('storage/images/upload_file.png') }}" alt="Choose FILE">
              <input type="file" accept="image/x-png,image/gif,image/jpeg,image/jpg" name="image" id="image">
            </label>
          </div>
          @endauth
          <button type="submit">Leave feedback</button>
      </form>

  </div>

  <div class="comments">

    

      @foreach ($comments as $comment)
      <div>
        <h1>{{ $comment->user->name }}: </h1>
        <p class="comment-body">"{{ $comment->comment_message }}"</p>
        @if (!$comment->image == null)
          <img src="{{ asset('storage/images/users/' . $comment->user->name . '/comments/' . $comment->image) }}">
        @endif
        <p class="date-time">published at: {{ $comment->created_at}}</p>
      </div>
    @endforeach
  </div>
@endsection