<!-- mentorship-index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Mentorship Program</h2>
                </div>
                <div class="card-body bg-light"> <!-- Added background color -->
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
                                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
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
                                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
