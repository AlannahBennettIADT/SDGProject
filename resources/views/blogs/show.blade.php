@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="container">
        <h1>{{ $blog->title }}</h1>
        <p><strong>Genre:</strong> {{ $blog->genre }}</p>
        <p><strong>Author:</strong> {{ $blog->author }}</p>
        <p><strong>Tags:</strong> {{ $blog->tags }}</p>
        <p><strong>Publish Date:</strong> {{ $blog->publish_date }}</p>
        <div>
            {!! $blog->content !!}
        </div>
        <hr>
        <h2>Comments</h2>
        @foreach($blog->comments as $comment)
            <div class="card mb-3">
                <div class="card-body">
                    <p>{{ $comment->content }}</p>
                    @if($comment->user)
                        <p><strong>Posted By:</strong> {{ $comment->user->name }}</p>
                    @else
                        <p><strong>Posted By:</strong> Unknown User</p>
                    @endif
                </div>
            </div>
        @endforeach

        @auth
            <form method="POST" action="{{ route('comments.store') }}">
                @csrf
                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                <div class="form-group">
                    <label for="content">Comment:</label>
                    <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit Comment</button>
            </form>
        @else
            <p>Please <a href="{{ route('login') }}">login</a> to post a comment.</p>
        @endauth
        <a href="{{ route('blogs.index') }}" class="btn btn-primary mt-3">Back to All Blogs</a>
    </div>
    
@endsection
