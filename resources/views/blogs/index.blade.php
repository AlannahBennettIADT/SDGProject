@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Blogs</h1>
        @auth
            @if(auth()->user()->hasRole('admin'))
                <a href="{{ route('blogs.create') }}" class="btn btn-primary mb-4">Create New Blog</a>
            @endif
        @endauth
        <div class="row">
            @foreach($blogs as $blog)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $blog->title }}</h5>
                            <p class="card-text"><strong>Genre:</strong> {{ $blog->genre}}</p>
                            <p class="card-text"><strong>Author:</strong> {{ $blog->author}}</p>
                            <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
