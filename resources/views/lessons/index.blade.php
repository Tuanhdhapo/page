@extends('layouts.app')

@section('content')
    <section class="course-detail container-fluid">
        <div class="course-detail-container">
            <div class="row ">
                <div class="col-lg-8">
                    <div class="img-container">
                        <img src="{{ asset($course->img_path) }}" alt="anh">
                    </div>
                </div>
                <div class="col-lg-4 detail-lesson-of-course">
                    <div class="col-lg-12 col-show-other">
                        <div class="row row-detail ">
                            <div class="col-lg-2  col-icon">
                                <img src="{{ asset('images/img-course.png') }}" alt="icon">
                            </div>
                            <div class="col-lg-4 pr-0  col-txt">
                                <p>Course :</p>
                            </div>
                            <div class="col-lg-6 pl-0  col-txt col-txt-main">
                                <p>{{ $course->title }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row row-detail">
                            <div class="col-lg-2  col-icon">
                                <img src="{{ asset('images/img-learners.png') }}" alt="">
                            </div>
                            <div class="col-lg-5 pr-0  col-txt">
                                <p>Learners :</p>
                            </div>
                            <div class="col-lg-5 pl-0  col-txt col-txt-main">
                                <p>{{ $course->number_user_student }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row row-detail">
                            <div class="col-lg-2  col-icon">
                                <img src="{{ asset('images/img-times.png') }}" alt="">
                            </div>
                            <div class="col-lg-5 pr-0  col-txt">
                                <p>Times :</p>
                            </div>
                            <div class="col-lg-5 pl-0  col-txt col-txt-main">
                                <p>{{ $course->course_time   }} h</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row row-detail">
                            <div class="col-lg-2  col-icon">
                                <img src="{{ asset('images/img-tags.png') }}" alt="">
                            </div>
                            <div class="col-lg-3 pr-0  col-txt">
                                <p>Tags :</p>
                            </div>
                            <div class="col-lg-7 pl-0  col-txt col-txt-main">
                                <p class="course-tags">@foreach ($course->tags as $tag) {{ $tag->content }} @endforeach</p>
                            </div> 
                        </div>
                        <hr>
                        <div class="row row-detail">
                            <div class="col-lg-2  col-icon">
                                <img src="{{ asset('images/img-price.png') }}" alt="">
                            </div>
                            <div class="col-lg-3 pr-0  col-txt">
                                <p>Price :</p>
                            </div>
                            <div class="col-lg-7 pl-0  col-txt col-txt-main">
                                <p>{{ number_format($course->price) }} VND</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row row-detail">
                            <div class="col-lg 12 btn-leave-course">
                                <form action="{{route('course-users.destroy', [$course])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Leave the course</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-two">
                <div class="col-lg-8">
                    <div class="nav-course-detail-container">
                        <ul class="nav nav-tabs nav-course-detail">
                            <li class="nav-item col-lg-2 pl-0">
                                <a class="nav-link active btn-nav-detail" data-bs-toggle="pill"
                                    href="#descriptions">Descriptions</a>
                            </li>
                            <li  class="nav-item col-lg-2 pl-0">
                                <a class="nav-link btn-nav-detail" data-bs-toggle="pill" href="#teacher">Tearcher</a>
                            </li>
                            <li class="nav-item col-lg-2 pl-0">
                                <a class="nav-link btn-nav-detail" data-bs-toggle="pill" href="#documents">Program</a>
                            </li>
                            <li class="nav-item col-lg-2 pl-0">
                                <a class="nav-link btn-nav-detail" data-bs-toggle="pill" href="#reviews">Reviews</a>
                            </li>
                        </ul>
                    </div>
                    <div class="lessons-teacher-reiews-container">
                        <div class="tab-content">
                            <div id="descriptions" class="tab-pane active">
                                @include('lessons._lesson_infor',$lesson)
                            </div>
                            <div id="teacher" class="tab-pane">
                                @include('courses.tab_teacher')
                            </div>
                            <div id="documents" class="tab-pane">
                                @include('lessons._document',$lesson)
                            </div>
                            <div id="reviews" class="tab-pane">
                                 @include('courses.tab_review', [$course])
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="col-lg-12 p-0 show-other-courses-container">
                        <div class="txt-show-other-courses">
                            <p>Other Courses</p>
                        </div>
                        @foreach ($course->other_courses as $key => $item)
                            <div class="show-other-courses">
                                <p>{{ $key + 1 }}. {{ $item->title }}</p>
                            </div>
                        @endforeach
                        <div class="col-kg-12 btn-view-all">
                            <a href="{{route('courses.index')}}">View all ours courses</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
