@extends('tempale')

@section('content')
<div class="article">
    @foreach ($articles as $article)
        <a href="{{ url('/article-' . $article->id) }}">
            <h1>{{ $article->headline }}</h1>
        </a>
    @endforeach
</div>
@endsection
