@extends('layouts.app')

@section('content')

    <div class="container lesson-detail">
        <div class="row">
            <div class="col-xl-8 lesson-detail-left">
                @include('course.img-course')
                <div class="lesson">
                    <div class="lesson-border">
                        @include('lesson.nav-lesson')
                        <p class="title-lesson">Descriptions lesson</p>
                        <p class="content-title-lesson">{{ $lesson->description }}</p>

                        <p class="title-lesson">Requirements</p>
                        <p class="content-title-lesson">{{ $lesson->requirement }}</p>

                        <div class="tags-lesson d-flex">
                            <p class="title-tags">Tags :</p>
                            @foreach ($tags as $tag)
                                <p class="card-tags">
                                    {{ $tag->content }}
                                </p>
                            @endforeach

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
