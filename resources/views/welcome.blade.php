@extends('layouts.app')

@section('content')
    <div class="container mx-5">
        <div class="row justify-content-center">
            <div>
                <h1>Hello World</h1>
                <h3>This is a laravel-bootstrap template</h3>
                <div class="mt-5">
                    <button type="button" class="btn btn-primary">Primary</button>
                    <button type="button" class="btn btn-secondary">Secondary</button>
                    <button type="button" class="btn btn-success">Success</button>
                    <button type="button" class="btn btn-danger">Danger</button>
                    <button type="button" class="btn btn-warning">Warning</button>
                    <button type="button" class="btn btn-info">Info</button>
                    <button type="button" class="btn btn-light">Light</button>
                    <button type="button" class="btn btn-dark">Dark</button>

                    <button type="button" class="btn btn-link">Link</button>
                </div>
                <div class="row row-cols-1 row-cols-md-4 g-4 mt-5">
                    @foreach ($courses as $course)
                    <div class="col">
                        <h5 class="card-title">{{ $course->course_sponsor }}</h5>
                        <div class="card" style="width: 18rem;">
                            @if ($course->course_image)
                                <img src="{{ $course->course_image }}" class="card-img-top" alt="Course Image">
                            @else
                                No image
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->title }}</h5>
                                <p class="card-text">{{ $course->description }}</p>
                                <p class="card-text">Start Date: {{ $course->start_date }}</p>
                                <p class="card-text">End Date: {{ $course->end_date }}</p>
                                <p class="card-text">Enrollment Deadline: {{ $course->enrollment_deadline }}</p>
                                <a href="#" class="btn btn-primary">Apply For Course</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

    
            </div>
        </div>

        
    </div>
@endsection