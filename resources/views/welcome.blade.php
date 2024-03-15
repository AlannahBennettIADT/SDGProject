@extends('layouts.app')

@section('content')
    <!-- Header Section -->
    <header class="header-section" style="background-color: #2F6866; color: #E8F6FD;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4 text-center text-md-left mb-4 mb-md-0">
                <h1>Welcome to Our Learning Platform</h1>
                <p class="lead">Empowering Women, Students, and Employers through Education</p>
            </div>
            <div class="col-md-8 text-center">
                <img src="/images/womensit.png" alt="New Image" class="img-fluid">
            </div>
        </div>
    </div>
</header>


    <!-- Main Content Section -->
    <div class="container">

        <!-- Statistics Section -->
        <section class="statistics-section" style="background-color: #FFFFFF; padding: 30px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h2>Statistics</h2>
                    </div>
                    <div class="col-md-8">
                        <!-- Insert your statistics display code here -->
                    </div>
                </div>
            </div>
        </section>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <!-- Header for Courses Section -->
                <div class="text-center mt-5">
                    <h2>View Our Courses!</h2>
                </div>

                <!-- Course Cards -->
                <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
                    @foreach ($courses->take(3) as $course)
                        <div class="col">
                            <div class="card h-100">
                                <!-- Course image -->
                                @if ($course->course_image)
                                    <img src="{{ $course->course_image }}" class="card-img-top" alt="Course Image">
                                @else
                                    <div class="text-center py-3">
                                        No image available
                                    </div>
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $course->title }}</h5>
                                    <p class="card-text">{{ $course->description }}</p>
                                    <p class="card-text">Start Date: {{ $course->start_date }}</p>
                                    <p class="card-text">End Date: {{ $course->end_date }}</p>
                                    <p class="card-text">Enrollment Deadline: {{ $course->enrollment_deadline }}</p>
                                    <a href="#" class="btn btn-primary btn-block">Apply For Course</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Resources for Working Women in STEM Section -->
    <section class="stem-resources-section py-5 my-5" style="background-color: #E8F6FD; color: #2F6866; margin-bottom: 30px; padding-bottom: 30px; padding-top: 30px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Resources for Working Women in STEM</h2>
                <p class="lead">Explore resources tailored for women in STEM fields to help you thrive in your career.</p>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-md-3">
                    <img src="/images/coursesrs.png" alt="Resource Image 1" class="img-fluid mb-3">
                    <h3>Job Searchers</h3>
                    <p>Description of the resource goes here.</p>
                </div>
                <div class="col-md-3">
                    <img src="/images/mentorshiprs.png" alt="Resource Image 2" class="img-fluid mb-3">
                    <h3>Mentorship Program</h3>
                    <p>Description of the resource goes here.</p>
                </div>
                <div class="col-md-3">
                    <img src="/images/blogrs.png" alt="Resource Image 3" class="img-fluid mb-3">
                    <h3>Useful Blogs </h3>
                    <p>Description of the resource goes here.</p>
                </div>
                <div class="col-md-3">
                    <img src="/images/coursesrs.png" alt="Resource Image 4" class="img-fluid mb-3">
                    <h3>Certified Courses</h3>
                    <p>Description of the resource goes here.</p>
                </div>
            </div>
        </div>
        <a href="#" class="btn btn-primary">Explore Resources</a>
    </div>
</section>

<section class="new-section" style=" background-color: #f8f9fa;">
    <div class="container">
        <div class="row">
            <!-- Image Column -->
            <div class="col-md-6">
                <img src="/images/random.png" alt="Image" class="img-fluid rounded" style="max-width: 70%;">
            </div>
            <!-- Text and Button Column -->
            <div class="col-md-6 align-self-center">
                <div class="text-center">
                    <h2 style="color: #007bff;">Discover New Horizons</h2>
                    <p class="lead">Expand your knowledge with our latest courses and resources.</p>
                    <p>Our platform offers a wide range of courses and resources designed to help you succeed in your career and personal development journey. Whether you're a professional seeking to upgrade your skills or a student eager to explore new fields, we have something for everyone.</p>
                    <a href="#" class="btn btn-primary">Explore Now</a>
                </div>
            </div>
        </div>
    </div>
</section>



    
    <div class="container  ">
    @if (!empty($error))
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
    @elseif (!empty($talks))
        @foreach ($talks as $talk)
            <div class="card mb-3 border-dark" style="border-color: #000;">
                <div class="card-header" style="background-color: #3498db; color: #fff;">
                    <h3>{{ $talk['title'] }}</h3>
                </div>
                @if (!empty($talk['thumbnail_url']))
                    <img src="{{ $talk['thumbnail_url'] }}" class="card-img-top" alt="Thumbnail">
                @endif
                <div class="card-body">
                    <p class="card-text">{{ $talk['description'] }}</p>
                    @if (!empty($talk['embed_url']))
                        <div class="text-center">
                            <iframe src="{{ $talk['embed_url'] }}" width="560" height="315" frameborder="0" allowfullscreen></iframe>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    @endif
</div>



    <!-- Footer Section -->
    <footer class="footer-section py-5" style="background-color: #2F6866; color: #E8F6FD; margin-top: 30px; padding-top: 20px;">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Courses</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Follow Us</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Instagram</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Legal</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
            </div>
            <p>&copy; {{ date('Y') }} Your Learning Platform. All rights reserved.</p>
            <p>Powered by SDG-5: Achieve gender equality and empower all women and girls</p>
        </div>
    </footer>
@endsection
