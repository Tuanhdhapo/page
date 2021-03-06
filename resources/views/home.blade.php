@extends('layouts.app')

@section('content')

<div id="draggable" class="ui-widget-content mess-facebook">
    <img id="show" class="messfb" src="{{ asset('images/message.png') }}">
    <div id="hide" class="hide">
        <div class="frame-mess">
            <div class="frame-hapo">
                <p>HapoLearn</p>
                <img id="closeMess" src="{{ asset('images/close-mess.png') }}">
            </div>
            <div class="hello">
                <img src="{{ asset('images/cu.png') }}">
                <p>HapoLearn xin chào bạn.<br>
                    Bạn có cần chúng tôi hỗ trợ gì không? </p>
            </div>
            <div class="login-mess">
                <img src="{{ asset('images/iconmess.png') }}">
                <a href=""> <span> Đăng nhập vào Messenger</span></a>
            </div>
            <div class="chat-hapo">
                <a href=""><p>Chat với HapoLearn trong Messenger</p>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="fix-fixed">&nbsp;</div>

<div class="banner-hapo">
    <div class="banner">
        <div class="info-banner">
            <p>Learn Anytime, Anywhere</p>
            <p> at HapoLearn<span> <img src="{{ asset('images/cu.PNG') }}" /> !</p>
            <p>
                Interactive lessons, "on-the-go"<br />
                practice, peer support.
            </p>
            <p><button>Start Learning Now!</button></p>
        </div>
    </div>
</div>
<div class="bg-banner"></div>

<div class="tutorial-hapo">
    <div class="container-card">
        <div class="row">
        @foreach ($courses as $course )
            <div class="col-xl-4 col-md-4 d-flex justify-content-center">
                <div class="card-hapo">
                    <img src="{{ asset($course->img_path) }}" class="card-img-top" alt="hjs" />
                    <div class="card-body">
                        <p class="card-title text-center">
                            {{ $course->title }}<span>Tutorial</span>
                        </p>
                        <p class="card-text text-center text-title">
                            {{ $course->description }}
                        </p>
                        <div class="text-center take-course">
                            <a href="#" class="btn btn-primary">Take This Course</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
    <div class="other-courses">
        <p class="text-center courses">Other courses</p>
        <div class="container-card">
            <div class="row">
                @foreach ($otherCourses as $otherCourse)
                <div class="col-xl-4 col-md-4 d-flex justify-content-center">
                    <div class="card-hapo">
                        <img src="{{ asset($otherCourse->img_path) }}" class="card-img-top" alt="css" />
                        <div class="card-body">
                            <p class="card-title text-center">{{ $otherCourse->title }}
                            </p>
                            <p class="card-text text-center text-title-frist">
                                {{ $otherCourse->description }}
                            </p>
                            <div class="text-center take-course">
                                <a href="#" class="btn btn-primary">Take This Course</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="view-courses">
        <p class="text-center">View All Our Courses <img class="arrow" src="{{ asset('images/arrow.png') }}"
                alt="arrow"></p>
    </div>
</div>

<div class="why-hapo">
    <div class="container-fuild">
        <div class="laptop"><img src="{{ asset('images/laptop.PNG') }}" alt="laptp"></div>
        <div class="info-laptop">
            <div class="info-why">
                <div class="">
                    <p>Why HapoLearn?</p>
                </div>
                <div class="list-whyhapo">
                    <ul>
                        <li class="fas fa-check-circle mr-2"><span>
                                Interactive
                                lessons, "on-the-go" practice, peer
                                support.</span></li>
                        <li class="fas fa-check-circle mr-2"><span>
                                Interactive
                                lessons, "on-the-go" practice, peer
                                support.</span></li>
                        <li class="fas fa-check-circle mr-2"> <span>
                                Interactive
                                lessons, "on-the-go" practice, peer
                                support.</span></li>
                        <li class="fas fa-check-circle mr-2"><span>
                                Interactive
                                lessons, "on-the-go" practice, peer
                                support.</span></li>
                        <li class="fas fa-check-circle mr-2"> <span>
                                Interactive
                                lessons, "on-the-go" practice, peer
                                support.</span></li>

                    </ul>
                </div>
            </div>
            <div class="laptop-phone"><img src="{{ asset('images/lap-ipone.png') }}" alt="laptop-ipone"></div>
        </div>
    </div>
</div>

<div class="feedback">
    <p class="feedback-title">Feedback</p>
    <p class="feedback-info text-center">What other students turned
        professionals have to say about us after learning with us and reaching their goals
    </p>
    <div class="fellback-all">
        <div class="feelbacks slick">
            <div class="feelback-card">
                <div class="feelback-info">
                    <div class="feelback-border">
                        <p>“A wonderful course on how to start. Eddie
                            beautifully conveys all essentials of a
                            becoming a good Angular developer. Very glad to have
                            taken this course. Thank you Eddie Bryan.”</p>
                    </div>
                    <div class="triangle"></div>
                </div>
                <div class="user">
                    <div class="image-user">
                        <img src="{{ asset('images/meo.PNG') }}" alt="avatar">
                    </div>
                    <div class="user-info">
                        <p class="name-user">Tuan Tran Hoang</p>
                        <p class="name-courses">Python</p>
                        <div class="star">
                            <p class="fas fa-star"></p>
                            <p class="fas fa-star"></p>
                            <p class="fas fa-star"></p>
                            <p class="fas fa-star"></p>
                            <p class="fas fa-star"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feelback-card">
                <div class="feelback-info">
                    <div class="feelback-border">
                        <p>“A wonderful course on how to start. Eddie
                            beautifully conveys all essentials of a
                            becoming a good Angular developer. Very glad to have
                            taken this course. Thank you Eddie Bryan.”</p>
                    </div>
                    <div class="triangle"></div>
                </div>
                <div class="user">
                    <div class="image-user">
                        <img src="{{ asset('images/meo.PNG') }}" alt="avatar">
                    </div>
                    <div class="user-info">
                        <p class="name-user">Hồ Đức Tuân</p>
                        <p class="name-courses">PHP & Laravel</p>
                        <div class="star">
                            <p class="fas fa-star"></p>
                            <p class="fas fa-star"></p>
                            <p class="fas fa-star"></p>
                            <p class="fas fa-star"></p>
                            <p class="fas fa-star"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feelback-card">
                <div class="feelback-info">
                    <div class="feelback-border">
                        <p>“A wonderful course on how to start. Eddie
                            beautifully conveys all essentials of a
                            becoming a good Angular developer. Very glad to have
                            taken this course. Thank you Eddie Bryan.”</p>
                    </div>
                    <div class="triangle"></div>
                </div>
                <div class="user">
                    <div class="image-user">
                        <img src="{{ asset('images/meo.PNG') }}" alt="avatar">
                    </div>
                    <div class="user-info">
                        <p class="name-user">Hồ Đức Tuân</p>
                        <p class="name-courses">PHP & Laravel</p>
                        <div class="star">
                            <p class="fas fa-star"></p>
                            <p class="fas fa-star"></p>
                            <p class="fas fa-star"></p>
                            <p class="fas fa-star"></p>
                            <p class="fas fa-star"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="become-member">
    <div class="info-become">
        <p class="text-center">Become a member of our<br>
            growing community!</p>
        <p class="text-center"><button>Start Learning Now!</button></p>
    </div>
</div>

<div class="statistic">
    <p class="text-center statis">Statistic</p>
    <div class="div-statistic">
        <div class="row">
            <div class="card text-center card-statistic">
                <div class="card-body">
                    <p class="card-title">Courses</p>
                    <p class="card-text">{{$totalCourses}}</p>
                </div>
            </div>
            <div class="card text-center card-statistic">
                <div class="card-body">
                    <p class="card-title">Lessons</p>
                    <p class="card-text">{{$totalLessons}}</p>
                </div>
            </div>
            <div class="card text-center card-statistic">
                <div class="card-body">
                    <p class="card-title">Learners</p>
                    <p class="card-text">{{$totalUsers}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
