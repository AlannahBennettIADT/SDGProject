@extends('layouts.app')

@section('content')
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #2F6866; color: white;">
                    <h2 class="text-center">{{ $course->title }}</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            @if ($course->course_image)
                                <img src="{{ $course->course_image }}" class="img-fluid" alt="Course Image">
                            @else
                                <div class="no-image-placeholder" style="height: 200px; background-color: #f0f0f0;"></div>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <p class="card-text">{{ $course->description }}</p>
                            <ul class="list-unstyled">
                                <li><strong>Course Sponsor:</strong> {{ $course->course_sponsor }}</li>
                                <li><strong>Start Date:</strong> {{ $course->start_date }}</li>
                                <li><strong>End Date:</strong> {{ $course->end_date }}</li>
                                <li><strong>Enrollment Deadline:</strong> {{ $course->enrollment_deadline }}</li>
                            </ul>
                            <div class="mt-3">
                                <a href="{{ route('courses.index') }}" class="btn btn-secondary mr-2 my-2">Go back to courses</a>
                                <!-- Display apply/remove course button -->
                                @if(Auth::check())
                                    @if(Auth::user()->applied_courses->contains($course->id))
                                        <!-- Display remove course button -->
                                        <form action="{{ route('courses.remove', $course->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Remove Course</button>
                                        </form>
                                    @else
                                        <!-- Display apply course button -->
                                        <form id="applyForm" action="{{ route('courses.apply', $course->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Apply For Course</button>
                                        </form>
                                    @endif
                                @else
                                    <p>Please <a href="{{ route('login') }}">login</a> to apply for this course.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-4 my-5">
                <div class="card-header" style="background-color: #2F6866; color: white;">
                    <h2 class="text-center">Lessons</h2>
                </div>
                <div class="card-body">
                    @if(Auth::check() && Auth::user()->applied_courses->contains($course->id))
                        <div class="progress mb-3">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                <span class="sr-only">25% Complete</span>
                            </div>
                        </div>
                            <button class="btn btn-primary btn-block mb-2">Lesson 1: Introduction to {{ $course->title }}</button>
                            <p>This lesson provides an overview of {{ $course->title }}.</p>
                            <button class="btn btn-primary btn-block mb-2">Lesson 2: {{ $course->title }} Basics</button>
                            <p>This lesson covers the basics of {{ $course->title }}.</p>
                            <button class="btn btn-primary btn-block mb-2">Lesson 3: Advanced Topics in {{ $course->title }}</button>
                            <p>This lesson delves into advanced topics related to {{ $course->title }}.</p>
                    @else
                        <p>Please apply for this course to access the lessons.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
