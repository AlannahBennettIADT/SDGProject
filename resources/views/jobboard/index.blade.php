@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Jobs</h1>
</div>

<div class="container">
    <form action="{{ route('searchJobs') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for jobs..." name="query">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </form>

    @if ($jobDetails)
    @foreach ($jobDetails as $job)
    <div class="card mb-3">
        <div class="card-header">{{ $job['job_title'] }}</div>
        <div class="card-body">
            <h5 class="card-title">{{ $job['employer_name'] }}</h5>
            <p class="card-text">{{ $job['job_description'] }}</p>
            <!-- Display other job details here -->
            <p>Employment Type: {{ $job['job_employment_type'] }}</p>
            <p>Location: {{ $job['job_city'] }}, {{ $job['job_state'] }}, {{ $job['job_country'] }}</p>
            <p>Posted At: {{ $job['job_posted_at_datetime_utc'] }}</p>
            <a href="{{ $job['job_apply_link'] }}" class="btn btn-primary">Apply Now</a>
        </div>
    </div>
    @endforeach
    @else
        <p>No jobDetails found.</p>
    @endif
</div>
@endsection