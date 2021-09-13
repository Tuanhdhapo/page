@extends('layouts.app')

@section('content')

    <div class="container lesson-detail">
        <div class="row">
            <div class="col-xl-8 lesson-detail-left">
                @include('course.img-course')
                <div class="lesson">
                    <div class="lesson-border">
                        @include('lesson.nav-lesson')

                        <p class="program">Program</p>
                        <div class="info-program">
                            <img src="{{ asset('images/doc.png') }}">&emsp;
                            <span>Lesson</span>&emsp;
                            <span>Program learn HTML/CSS</span>
                            <button type="submit"
                                class="btn btn-primary
                                    view-all">Preview</button>
                        </div>

                        <div class="info-program">
                            <img src="{{ asset('images/pdf.png') }}">&emsp;
                            <span>PDF</span>&emsp;&emsp;
                            <span>Download course slides</span>
                            <button type="submit"
                                class="btn btn-primary
                                    view-all">Preview</button>
                        </div>

                        <div class="info-program">
                            <img src="{{ asset('images/video.png') }}">&emsp;
                            <span>Video</span>&emsp;&nbsp;
                            <span>Download course videos</span>
                            <button type="submit"
                                class="btn btn-primary
                                    view-all">Preview</button>
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
