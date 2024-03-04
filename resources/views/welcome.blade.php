@extends('layouts.app')

@section('content')
    <div class="container mx-5">
        <div class="row justify-content-center">
            <div>
                <h1>Hello World</h1>
                <h3>This is a Laravel-bootstrap template</h3>
                <div class="mt-5">
                    <!-- Buttons -->
                </div>

                <!-- Job search form -->
                <form action="{{ route('searchJobs') }}" method="GET">
                    <input type="text" name="query" placeholder="Search for jobs...">
                    <button type="submit">Search</button>
                </form>


                <!-- Display courses -->
                <div class="row row-cols-1 row-cols-md-4 g-4 mt-5">
                    @foreach ($courses as $course)
                    <div class="col">
                        <h5 class="card-title">{{ $course->course_sponsor }}</h5>
                        <div class="card" style="width: 18rem;">
                            <!-- Course image -->
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
