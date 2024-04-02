@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Blog</h1>
        <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
            </div>

            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" class="form-control" id="genre" name="genre" required>
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" id="author" name="author" required>
            </div>

            <div class="mb-3">
                <label for="tags" class="form-label">Tags</label>
                <input type="text" class="form-control" id="tags" name="tags" required>
            </div>

            <div class="mb-3">
                <label for="publish_date" class="form-label">Publish Date</label>
                <input type="date" class="form-control" id="publish_date" name="publish_date" required>
            </div>

            <div class="mb-3">
                <label for="blog_image" class="form-label">Blog Image</label>
                <input type="file" class="form-control" id="blog_image" name="blog_image" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Blog</button>
        </form>
    </div>
@endsection
