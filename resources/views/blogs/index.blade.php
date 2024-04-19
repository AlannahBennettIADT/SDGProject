@extends('layouts.app')

@section('content')
<div class="header" style="height: 150px; background-image: url('/images/bg2.jpg'); background-size: cover; background-position: center; text-align: center; color: white;">
    <div>
        <h1 class="text-center mb-4 py-5">Blogs</h1>
    </div>
</div>
<div class="container py-5">
    @auth
        @if(auth()->user()->hasRole('admin'))
            <a href="{{ route('blogs.create') }}" class="btn btn-primary mb-4">Create New Blog</a>
        @endif
    @endauth
    <div class="row">
        @foreach($blogs as $blog)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow">
                @auth
                    @if(auth()->user()->hasRole('admin'))
                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="position-absolute top-0 end-0 m-2 p-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">X</button>
                        </form>
                    @endif
                @endauth

                <div class="card-body d-flex flex-column justify-content-between">
                    @if ($blog->blog_image)
                        <div class="text-center mb-3">
                            <img src="{{ asset('storage/' . $blog->blog_image) }}" style="width: 100%; max-height: 200px; object-fit: cover;" class="card-img-top" alt="Blog Image">
                        </div>
                    @else
                        <div class="no-image-placeholder" style="height: 200px; background-color: #f0f0f0;"></div>
                    @endif
                    <div>
                        <h5 class="card-title">{{ $blog->title }}</h5>
                        <p class="card-text"><strong>Genre:</strong> {{ $blog->genre }}</p>
                        <p class="card-text"><strong>Author:</strong> {{ $blog->author }}</p>
                        <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection