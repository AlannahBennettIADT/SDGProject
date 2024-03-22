@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Profile Information</h2>
                </div>

                <div class="card-body">
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    @if($roles->isNotEmpty())
                        <p><strong>Roles:</strong>
                            <ul>
                                @foreach($roles as $role)
                                    <li>{{ $role->name }}</li>
                                @endforeach
                            </ul>
                        </p>
                    @endif
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h2 class="text-center">Enrolled Courses</h2>
                </div>

                <div class="card-body">
                    <div class="row">
                        @foreach($user->applied_courses as $course)
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    @if ($course->course_image)
                                        <img src="{{ $course->course_image }}" class="card-img-top" alt="Course Image">
                                    @else
                                        <div class="no-image-placeholder"></div>
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $course->title }}</h5>
                                        <strong>Start Date:</strong> {{ $course->start_date }}
                                        <div class="text-center"> <!-- Center the button -->
                                            <a href="{{ route('courses.show', $course->id) }}" class="btn btn-primary my-2">View Course</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
