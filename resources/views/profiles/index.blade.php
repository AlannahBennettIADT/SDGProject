@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<style>
        body {
            background-image: url('https://static.vecteezy.com/system/resources/previews/019/472/343/non_2x/wavy-green-pastel-background-free-vector.jpg');
        }
    </style>

    
<div class="container mt-4" >
    <div class="row">
        <div class="col-md-12"> <!-- Make the column full width -->
            <div class="row">
                <div class="col-md-3 pl-0 pr-0"> <!-- Adjust the column size and remove padding -->
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center">My Profile</h4>
                        </div>
                        <div class="position-relative mb-3">
                            <div class="bg-dark" style="position: absolute; top: 0; width: 100%; height: 80%;"></div>
                            <div class="text-center" style="position: relative; width: 100%;">
                                <div style="display: inline-block; position: relative; top: 50%; transform: translateY(20%);">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHUyeHkZzAKI4scD3H59lC92acZj35vp_cFC-jq1Vp4Q&s" class="rounded-circle" alt="Cinque Terre" width="100"> 
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p><strong>Name:</strong> <br>{{ $user->name }}</p>
                            <p><strong>Email:</strong> <br>{{ $user->email }}</p>
                            @if($roles->isNotEmpty())
                                <p><strong>Roles:</strong>
                                    <ul>
                                        @foreach($roles as $role)
                                            <li>{{ $role->name }}</li>
                                        @endforeach
                                    </ul>
                                </p>
                            @endif
                            <button type="button" class="btn btn-success">Edit Profile</button>
                        </div>
                    </div>
                </div>


                <div class="col-md-9 pl-0 pr-0"> <!-- Adjust the column size and remove padding -->
    <div class="card">
        <div class="card-header">
            <h4 class="text-center">Activities</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <!-- Circular badge for user's rank -->
                    <div class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center" style="width: 80px; height: 80px; font-size: 24px;">
                        <span>1</span> <!-- Replace with user's rank -->
                    </div>
                </div>
                <div class="col-md-10">
                    <!-- Level ranking section -->
                    <h3>Rank</h3>
                    <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: 75%"></div>
                    </div>
                </div>
            </div>

            <!-- Courses section -->
            <h4 class="mt-4 mb-2">Courses</h4>
            <div class="row">
                @foreach($user->applied_courses as $course)
                <div class="col-md-3 mb-3"> <!-- Adjust the column size for course cards -->
                    <div class="card">
                        @if ($course->course_image)
                        <img src="{{ $course->course_image }}" class="card-img-top" alt="Course Image">
                        @else
                        <div class="no-image-placeholder"></div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <strong>Start Date:</strong> {{ $course->start_date }}
                            <div class="text-center"> 
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
    </div>
</div>
@endsection
