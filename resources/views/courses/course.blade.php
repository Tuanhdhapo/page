<div class="card mb-1 col-md-6 col-12 card-course">
    <div class="row g-0 row-card-course">
        <div class="col-md-2 img-course">
            <img src="{{ $course->img_path }}" class="img-fluid " alt="img-course">
        </div>
        <div class="col-md-10">
            <div class="card-body">
                <p class="card-title course-title">{{ $course->title }}</p>
                <p class="card-text course-text">{{ $course->description }}</p>
            </div>
        </div>
        <div>
            <a href="{{ route('courses.show', [$course->id]) }}" class="btn btn-primary button-more">More</a>
        </div>
        <div class="info-course">
            <div class="info-detail-one">
                <p>Learners</p>
                <p>{{ $course->number_user_student }}</p>
            </div>
            <div class="info-detail-two">
                <p>Lessons</p>
                <p>{{ $course->number_lesson }}</p>
            </div>
            <div class="info-detail-three">
                <p>Times</p>
                <p>{{ $course->course_time }}</p>
            </div>
        </div>
    </div>
</div>
