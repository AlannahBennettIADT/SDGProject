@extends('layouts.app')

@section('content')


<div class="container-fluid bg-dark py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center text-white">
                <h1 class="mb-3">Find Your Dream Job</h1>
                <p class="lead mb-4">Search thousands of job listings and start your career journey today.</p>
                <form action="{{ route('searchJobs') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for jobs..." name="query">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container py-5">

    @if ($jobDetails)
    @foreach ($jobDetails as $job)
    <div class="card mb-3 border-dark" style="border-color: #000;">
        <div class="card-header" style="background-color: #3498db; color: #fff;">
            <h3>{{ $job['job_title'] }}</h3>
        </div>
        <div class="card-body">
        @if ($job['employer_logo'])
                <img src="{{ $job['employer_logo'] }}" class="card-img-top img-fluid mb-3" alt="Employer Image" style="max-width: 100px;">
            @endif
            <h3 class="card-title">{{ $job['employer_name'] }}</h3>
            <!-- <p class="card-text">{{ $job['job_description'] }}</p> -->
            <p class="card-text"><strong>Employment Type:</strong> {{ $job['job_employment_type'] }}</p>
            <p class="card-text"><strong>Location:</strong> {{ $job['job_city'] }}, {{ $job['job_state'] }}, {{ $job['job_country'] }}</p>
            <p class="card-text"><strong>Posted At:</strong> {{ $job['job_posted_at_datetime_utc'] }}</p>
            <a href="{{ $job['job_apply_link'] }}" class="btn btn-success" style="background-color: #2ecc71; border-color: #2ecc71;">Apply Now</a>
        </div>
    </div>
    @endforeach
    @else
        <p>No jobDetails found.</p>
    @endif
</div>



@endsection
