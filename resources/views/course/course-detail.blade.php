@extends('layouts.app')

@section('content')

    <div class="container course-detail">
        <div class="row">
            <div class="col-xl-8 course-detail-left">

                @include('course.img-course')

                <div class="lesson">
                    <div class="lesson-boder">
                        <div class="lesson-link d-flex">
                            <a href="">Lessons</a>
                            <a href="/lessonteacher">Teacher</a>
                            <a href="/lessonreview">Reviews</a>
                        </div>
                        <div class="join-lesson d-flex">
                            <div class="search">
                                <input class="search-input" id="filter-search" type="search" name="search_form_input"
                                    placeholder="Search..." aria-label="Search">
                                <img src="{{ asset('images/glass.png') }}" alt="glass">
                            </div>
                            <div class="search-button">
                                <button type="submit"
                                    class="btn btn-primary
                                        search-button">Search</button>
                            </div>
                            <button type="submit" class="btn btn-primary
                                    join">Join
                                Lessons</button>

                        </div>
                        @foreach ($lessons as $key => $lesson)
                            <div class="content-lesson d-flex">
                                <p class="content-detail">{{ $key + 1 }}. {{ $lesson->requirement }}</p>
                                <div class="search-button">
                                    <a href="{{ route('lesson.detail', $lesson->id) }}"> <button type="submit"
                                            class="btn btn-primary learn-button">Learn
                                        </button>
                                    </a>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
            <div class="col-xl-4 course-detail-right">
                <div class="descriptions-course">
                    <p>Descriptions course</p>
                    <p>{{ $course->description }}</p>
                </div>
                <div class="course-info">
                    <div class="course-info-detail">
                        <img src="{{ asset('images/img-learners.png') }}">
                        <span>Learns :</span>
                        <span>{{ $course->number_user_student }}</span>
                    </div>

                    <div class="course-info-detail">
                        <img src="{{ asset('images/img-lessons.png') }}">
                        <span>Lessons :</span>
                        <span>{{ $course->number_lesson }} Lessons</span>
                    </div>

                    <div class="course-info-detail">
                        <img src="{{ asset('images/img-times.png') }}">
                        <span>Times :</span>
                        <span>{{ $course->course_time }} Hours</span>
                    </div>

                    <div class="course-info-detail">
                        <img src="{{ asset('images/img-tags.png') }}">
                        <span>Tags :</span>

                        @foreach ($tags as $tag)
                            <span>#{{ $tag->content }} </span>
                        @endforeach

                    </div>

                    <div class="course-info-detaill">
                        <img src="{{ asset('images/img-price.png') }}">
                        <span>Price :</span>
                        <span>{{ $course->price }}</span>
                    </div>
                </div>
                @include('course.other-course')
            </div>
        </div>
    </div>

@endsection
