<div class="row ml-0 mr-0 detail-lessons-container">
    <form class="row form-search-detail" method="get">
        <div class="col-lg-8 detail-lessons">
            <input type="text" class="form-control search-lessons" name="key_detail_course" placeholder="Search"
                aria-label="Search" @if (isset($keyword)) value={{ $keyword }} @endif>
        </div>
        <div class="col-lg-2 btn-search-lessons">
            <input type="submit" value="Search" class="btn-search">
        </div>
    </form>
    <div class="col-lg-4 pr-0 align-self-center btn-join-container">
        @if (Auth::check() && $course->check_joined_course == true)
            <a href="#" class="btn-join-course" id="btn-joined-course">Joined the course</a>
        @else
            <a href="{{ route('courses.join', $course) }}" class="btn-join-course" id="btn-join-course">Join the course</a>
        @endif
    </div>
</div>
<div class="row m-0 show-lessons-container">
    <div class="col-lg-12">
        @foreach ($course->lessons as $key => $lesson)
            <div class="row">
                <div class="col-lg-8 pr-0">
                    <p class="txt-title-lessons">{{ $key + 1 }}. {{ $lesson->title }}</p>
                </div>
                <div class="col-lg-4 pl-0 btn-more-lessons">
                    @if (Auth::check() && $course->check_joined_course)

                        @if (Auth::check() && $lesson->check_joined_lesson==false)
                            <a href="{{ route('course.lessons.show',  [$course,$lesson]) }}">Learning</a>
                        @else
                            <a href="{{ route('lessons.join',[$course,$lesson]) }}">Learn</a>    
                        @endif 
                    @endif
                    
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="pagination-container">
    {{ $lessons->appends($_GET)->links('pagination::bootstrap-4') }}
</div>
