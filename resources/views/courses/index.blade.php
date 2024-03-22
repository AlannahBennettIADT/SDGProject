@extends('layouts.app')

@section('content')
<div class="container">
    <header class="text-center my-5">
        <h1>Welcome to Our Courses</h1>
        <p>Explore our wide range of educational opportunities</p>
    </header>
    <div class="row mb-4">
        <div class="col-md-6">
            <form action="{{ route('courses.index') }}" method="GET" class="form-inline">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search for courses...">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <h2 class="mb-4">All Courses</h2>
    <div class="row row-cols-1 row-cols-md-3">
        @if ($courses->count() > 0)
            @foreach ($courses as $course)
                <div class="col mb-4">
                    <div class="card h-100">
                        @if ($course->course_image)
                            <img src="{{$course->course_image}}" class="card-img-top" alt="...">
                        @else
                            <div class="no-image-placeholder"></div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{$course->title}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{$course->course_sponsor}}</h6>
                            <p class="card-text">{{$course->description}}</p>
                            <ul class="list-unstyled">
                                <li><strong>Start Date:</strong> {{$course->start_date}}</li>
                                <li><strong>End Date:</strong> {{$course->end_date}}</li>
                                <li><strong>Enrollment Deadline:</strong> {{$course->enrollment_deadline}}</li>
                            </ul>
                            <a href="#" class="btn btn-primary">Apply For Course</a>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- Pagination Links --}}
            <div class="col-12">
                {{ $courses->links() }}
            </div>
        @else
            <div class="col-12">
                <p>No courses found.</p>
            </div>
        @endif
    </div>
</div>
@endsection
