<div class="row row-course">
    @foreach ($courses as $course)
        <div class="card mb-1 col-md-6 col-12 card-course">
            <div class="row g-0 row-card-course">
                <div class="col-md-2 img-course">
                    <img src="{{ $course->img_path }}" class="img-fluid rounded-start" alt="img-course">
                </div>
                <div class="col-md-10">
                    <div class="card-body">
                        <p class="card-title course-title">{{ $course->title }}</p>
                        <p class="card-text course-text">{{ $course->content }}</p>
                    </div>
                </div>
                <div>
                    <a href="{{ route('courses.detail', $course->id) }}"> <button type="button"
                            class="btn btn-primary button-more">More</button></a>
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
    @endforeach
</div>
