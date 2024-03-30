<!-- events/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Technology Events</h1>
    @if (!empty($eventDetails))
        <div class="row">
            @foreach ($eventDetails as $event)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        @if (isset($event['thumbnail']))
                            <img src="{{ $event['thumbnail'] }}" class="card-img-top" alt="Event Thumbnail" style="max-height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $event['name'] }}</h5>
                            <p class="card-text">
                                <strong>Start Time:</strong> {{ $event['start_time'] }}<br>
                    
                              
                                <strong>Address:</strong> {{ $event['venue']['full_address'] }}<br>
                                <strong>Link:</strong> <a href="{{ $event['link'] }}" target="_blank">{{ $event['link'] }}</a>
                            </p>
                            
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No technology events found.</p>
    @endif
</div>
@endsection
