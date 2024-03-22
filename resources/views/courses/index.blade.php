@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center my-5">
        <h1>Welcome to Our Courses</h1>
        <p>Explore our wide range of educational opportunities</p>
    </div>
    <div class="row mb-4">
        <div class="col-md-6 mx-auto">
            <form action="{{ route('courses.index') }}" method="GET" class="form-inline">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search for courses...">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <h2 class="mb-4 text-center">All Courses</h2>
    <div class="row row-cols-1 row-cols-md-3">
        @forelse ($courses as $course)
            <div class="col mb-4">
                <div class="card bg-light">
                    <div class="card-img-top">
                        @if ($course->course_image)
                            <img src="{{ $course->course_image }}" class="img-fluid" alt="Course Image">
                        @else
                            <div class="no-image-placeholder"></div>
                        @endif
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $course->course_sponsor }}</h6>
                        <p class="card-text">{{ $course->description }}</p>
                        <ul class="list-unstyled">
                            <li><strong>Start Date:</strong> {{ $course->start_date }}</li>
                            <li><strong>End Date:</strong> {{ $course->end_date }}</li>
                            <li><strong>Enrollment Deadline:</strong> {{ $course->enrollment_deadline }}</li>
                        </ul>
                        <a href="{{ route('courses.show', $course->id) }}" class="btn btn-primary btn-block">View Details</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">No courses found.</p>
            </div>
        @endforelse
    </div>
    {{-- Pagination Links --}}
    <div class="row">
        <div class="col-12">
            {{ $courses->links() }}
        </div>
    </div>
</div>
@endsection
