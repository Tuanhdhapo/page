@extends('layouts.app')

@section('content')
    <section class="course-detail container-fluid">
        <div class="course-detail-container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="img-container">
                        <img src="{{ asset($course->img_path) }}" alt="anh">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="description-detail-course" >
                        <div class="title-description-container">
                            <p class="title-description">Descriptions course</p>
                        </div>
                        <div class="description-container">
                            <p class="description">{{ $course->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-two">
                <div class="col-lg-8">
                    <div class="nav-course-detail-container">
                        <ul class="nav nav-tabs  nav-pills nav-course-detail">
                            <li class="nav-item col-lg-2 pl-0">
                                <a class="nav-link active btn-nav-detail" id="href-lesson" data-bs-toggle="pill"  role="tab"
                                    href="#lessons">Lessons</a>
                            </li>
                            <li class="nav-item col-lg-2 pl-0">
                                <a class="nav-link btn-nav-detail" id="href-teacher" data-bs-toggle="pill"  role="tab"
                                    href="#teacher">Tearcher</a>
                            </li>
                            <li class="nav-item col-lg-2 pl-0">
                                <a class="nav-link btn-nav-detail" id="href-review" data-bs-toggle="pill"  role="tab"
                                    href="#reviews">Reviews</a>
                            </li>
                        </ul>
                    </div>
                    <div class="lessons-teacher-reiews-container">
                        <div class="tab-content">
                            <div id="lessons" class="tab-pane fade show active" role="tabpanel">
                                @include('courses.tab_lessons', [$lessons, $course,$isJoined,$learnedPart,
                                $totalDocuments])
                            </div>
                            <div id="teacher" class="tab-pane fade " role="tabpanel">
                                @include('courses.tab_teacher')
                            </div>
                            <div id="reviews" class="tab-pane ">
                                @include('courses.tab_review', [$course ,$totalRate])
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="col-lg-12 info-course-detail ">
                        <div class="row row-detail">
                            <div class="col-lg-2 align-self-center col-icon">
                                <img src="{{ asset('images/img-learners.png') }}" alt="">
                            </div>
                            <div class="col-lg-4 pr-0 align-self-center col-txt">
                                <p>Learners :</p>
                            </div>
                            <div class="col-lg-4 pl-0 align-self-center col-txt col-txt-main">
                                <p>{{ $course->number_user_student }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row row-detail">
                            <div class="col-lg-2 align-self-center col-icon">
                                <img src="{{ asset('images/img-lessons.png') }}" alt="">
                            </div>
                            <div class="col-lg-3 pr-0 align-self-center col-txt">
                                <p>Lessons :</p>
                            </div>
                            <div class="col-lg-4 pl-0 align-self-center col-txt col-txt-main">
                                <p>{{ $course->number_lesson }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row row-detail">
                            <div class="col-lg-2 align-self-center col-icon">
                                <img src="{{ asset('images/img-times.png') }}" alt="">
                            </div>
                            <div class="col-lg-3 pr-0 align-self-center col-txt">
                                <p>Times :</p>
                            </div>
                            <div class="col-lg-4 pl-0 align-self-center col-txt col-txt-main">
                                <p>{{ $course->courseTime }} Hours</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row row-detail">
                            <div class="col-lg-2 align-self-center col-icon">
                                <img src="{{ asset('images/img-tags.png') }}" alt="">
                            </div>
                            <div class="col-lg-3 pr-0 align-self-center col-txt">
                                <p>Tags :</p>
                            </div>
                            <div class="col-lg-7 pl-0 align-self-center col-txt col-txt-tags">
                                <p class="course-tags">@foreach ($course->tags as $tag) #{{ $tag->content }} @endforeach</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row row-detail">
                            <div class="col-lg-2 align-self-center col-icon">
                                <img src="{{ asset('images/img-price.png') }}" alt="">
                            </div>
                            <div class="col-lg-3 pr-0 align-self-center col-txt">
                                <p>Price :</p>
                            </div>
                            <div class="col-lg-7 pl-0 align-self-center col-txt col-txt-main">
                                <p>{{ number_format($course->price) }} VND</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 p-0 show-other-courses-container">
                        <div class="txt-show-other-courses">
                            <p>Other Courses</p>
                        </div>
                        @foreach ($otherCourses as $key => $item)
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
