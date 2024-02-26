@extends ('layouts.app')

@section('content')
<div class="container">
    <h1> All Courses </h1>
</div>

<div class="container text-center">
  <div class="row row-cols-4">
  @foreach ($courses as $course)
    <div class="col">
        <h5 class="card-title">{{$course->course_sponsor}}</h5>
        <div class="card" style="width: 18rem;">
        @if ($course->course_image)
        <img src="{{$course->course_image}}"class="card-img-top" alt="...">
        @else
            No image
        @endif
        <div class="card-body">
        <h5 class="card-title">{{$course->title}}</h5>
        <p class="card-text">{{$course->description}}</p>
        <p class="card-text">{{$course->start_date}}</p>
        <p class="card-text">{{$course->end_start}}</p>
        <p class="card-text">{{$course->enrollment_deadline}}</p>
        <a href="#" class="btn btn-primary">Apply For Course</a>
    </div>
</div>
@endforeach
  </div>
</div>
@endsection
