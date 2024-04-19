@extends('layouts.app')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(auth()->check())
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Mentorship Program</h2>
                    </div>
                    <div class="card-body bg-light">
                        @if(auth()->user()->hasRole('mentor'))
                            <div class="alert alert-info" role="alert">
                                You've already applied as a Mentor. Thank you for your interest!
                            </div>
                        @elseif(auth()->user()->hasRole('mentee'))
                            <div class="alert alert-info" role="alert">
                                You've already applied as a Mentee. Thank you for your interest!
                            </div>
                        @else
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <h3 class="text-center">Become a Mentor</h3>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('mentor.register') }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="mentor_name">Name</label>
                                                    <input type="text" class="form-control" id="mentor_name" name="mentor_name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="mentor_email">Email</label>
                                                    <input type="email" class="form-control" id="mentor_email" name="mentor_email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="mentor_expertise">Area of Expertise</label>
                                                    <input type="text" class="form-control" id="mentor_expertise" name="mentor_expertise" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="mentor_description">Description</label>
                                                    <textarea class="form-control" id="mentor_description" name="mentor_description" rows="3" required></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-block">Register as Mentor</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <h3 class="text-center">Become a Mentee</h3>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('mentee.register') }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="mentee_name">Name</label>
                                                    <input type="text" class="form-control" id="mentee_name" name="mentee_name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="mentee_email">Email</label>
                                                    <input type="email" class="form-control" id="mentee_email" name="mentee_email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="mentee_interests">Interests/Goals</label>
                                                    <textarea class="form-control" id="mentee_interests" name="mentee_interests" rows="3" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="mentee_experience">Experience</label>
                                                    <textarea class="form-control" id="mentee_experience" name="mentee_experience" rows="3" required></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-block">Register as Mentee</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

            @else
            <body style="background-color: #2F6866; color: #E8F6FD;">
                <div class="jumbotron text-white">
                    <h1 class="display-4 text-center">Welcome to Our Mentorship Program</h1>
                    <p class="lead text-center">Our Mentorship Program offers a unique opportunity for both mentors and mentees to grow personally and professionally.</p>
                    <hr class="my-4"> 
                </div>

                <div class="container py-3">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <h2 class="text-center">Why Choose Our Mentorship Program?</h2>
                            <p class="text-center">Our program provides:</p>
                            <ul>
                                <li>Access to experienced mentors</li>
                                <li>Personalized guidance</li>
                                <li>Networking opportunities</li>
                                <li>Career advancement support</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <p class="text-center">Join us today to take advantage of these benefits and embark on a rewarding mentorship journey!</p>
                    <div class="text-center">
                        <a class="btn btn-light btn-lg" href="{{ route('register') }}" role="button">Register Now</a>
                        <a class="btn btn-outline-light btn-lg" href="{{ route('login') }}" role="button">Login</a>
                    </div>
            </body>



            @endif
        </div>
    </div>
</div>
@endsection
