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
    <section class="statistics-section" style="background-color: #f8f9fa; padding: 30px;">
    <div class="accordion" id="sdgAccordion">
        @foreach ($statistics as $stat)
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{ $loop->iteration }}" style="background-color: #2F6866; color: #fff; padding: 10px; border-radius: 5px;">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $loop->iteration }}" aria-expanded="false" aria-controls="collapse{{ $loop->iteration }}" style="font-weight: bold;">
                    Click Here to View all SDG 5 Goals
                    </button>
                </h2>
                <div id="collapse{{ $loop->iteration }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $loop->iteration }}" data-bs-parent="#sdgAccordion">
                    <div class="accordion" id="innerAccordion{{ $loop->iteration }}">
                        @foreach ($stat['indicators'] as $indicator)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="innerHeading{{ $loop->parent->iteration }}-{{ $loop->iteration }}" style="background-color: #f0f0f0; color: #333; padding: 10px; border-bottom: 1px solid #ccc;">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#innerCollapse{{ $loop->parent->iteration }}-{{ $loop->iteration }}" aria-expanded="false" aria-controls="innerCollapse{{ $loop->parent->iteration }}-{{ $loop->iteration }}" style="font-weight: bold;">
                                        {{ $indicator['code'] }}
                                    </button>
                                </h2>
                                <div id="innerCollapse{{ $loop->parent->iteration }}-{{ $loop->iteration }}" class="accordion-collapse collapse" aria-labelledby="innerHeading{{ $loop->parent->iteration }}-{{ $loop->iteration }}" data-bs-parent="#innerAccordion{{ $loop->parent->iteration }}">
                                    <div class="accordion-body" style="background-color: #fff; padding: 10px;">
                                        <p><strong>Indicator Code:</strong> {{ $indicator['code'] }}</p>
                                        <p><strong>Description:</strong> {{ $indicator['description'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>



    <!-- Courses  -->
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="text-center mt-5">
                <h2>View Our Courses!</h2>
            </div>
                    <!-- Course Cards -->
                    <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
                        @foreach ($courses->take(3) as $course)
                            <div class="col">
                                <div class="card h-100">
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
                                        <a href="{{ route('courses.show', $course->id) }}" class="btn btn-primary btn-block">View Details</a>
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
