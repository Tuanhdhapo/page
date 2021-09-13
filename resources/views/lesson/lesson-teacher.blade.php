@extends('layouts.app')

@section('content')

    <div class="container lesson-detail">
        <div class="row">
            <div class="col-xl-8 lesson-detail-left">
                @include('course.img-course')
                <div class="lesson">
                    <div class="lesson-border">
                        @include('lesson.nav-lesson')
                        <p class="main-mentor">Main Teachers</p>
                        <div class="card mb-3 card-mentor">
                            <div class="row g-0">
                                <div class="col-md-2">
                                    <img src="{{ asset('images/luutrungnghia.png') }}"
                                        class="img-fluid
                                            rounded-start avatar-mentor"
                                        alt="...">
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body info-mentor">
                                        <p class="card-title name-mentor">LuuTrungNghia</p>
                                        <p class="experience"><small>Second
                                                Year Teacher</small></p>
                                        <div class="contact-mentor">
                                            <img class="" src=" {{ asset('images/google-mentor.png') }}">
                                            <img class=""src=" {{ asset('images/facebook-mentor.png') }}">
                                            <img class=""src=" {{ asset('images/slack-mentor.png') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p>Vivamus volutpat eros pulvinar velit
                                        laoreet, sit amet egestas erat
                                        dignissim. Sed quis rutrum tellus,
                                        sit amet viverra felis. Cras
                                        sagittis sem sit amet urna feugiat
                                        rutrum. Nam nulla ipsum, venenatis
                                        malesuada felis quis, ultricies
                                        convallis neque. Pellentesque
                                        tristique </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-4 lesson-detail-right">
                @include('lesson.info-lesson')
                @include('course.other-course')
            </div>
        </div>
    </div>
@endsection
