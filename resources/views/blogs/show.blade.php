<!-- resources/views/blogs/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $blog->title }}</h1>
        <p><strong>Genre:</strong> {{ $blog->genre }}</p>
        <p><strong>Author:</strong> {{ $blog->author }}</p>
        <p><strong>Tags:</strong> {{ $blog->tags }}</p>
        <p><strong>Publish Date:</strong> {{ $blog->publish_date }}</p>
        <div>
            {!! $blog->content !!}
        </div>
        <a href="{{ route('blogs.index') }}" class="btn btn-primary">Back to All Blogs</a>
    </div>
@endsection
