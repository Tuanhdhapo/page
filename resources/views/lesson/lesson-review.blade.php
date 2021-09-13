@extends('layouts.app')

@section('content')

    <div class="container lesson-detail">
        <div class="row">
            <div class="col-xl-8 lesson-detail-left">
                @include('course.img-course')
                <div class="lesson">
                    <div class="lesson-border">
                        @include('lesson.nav-lesson')

                        <p class="review">05 Reviews</p>
                        <div class="all-review">

                            <div class="img-review">
                                <p>5</p>
                                <p>★★★★★</p>
                                <p>2 Ratings</p>
                            </div>
                            <div class="table-review">
                                <div class="border-review">
                                    <div class="d-flex div-review">
                                        <span>5 starts</span> &nbsp;
                                        <span class="bar-review"></span>&nbsp;
                                        <span>2</span>
                                    </div>
                                    <div class="d-flex div-review">
                                        <span>4 starts</span> &nbsp;
                                        <span class="bar-review"></span>&nbsp;
                                        <span>2</span>
                                    </div>
                                    <div class="d-flex div-review">
                                        <span>3 starts</span> &nbsp;
                                        <span class="bar-review"></span>&nbsp;
                                        <span>2</span>
                                    </div>
                                    <div class="d-flex div-review">
                                        <span>2 starts</span> &nbsp;
                                        <span class="bar-review"></span>&nbsp;
                                        <span>2</span>
                                    </div>
                                    <div class="d-flex div-review">
                                        <span>1 starts</span> &nbsp;
                                        <span class="bar-review"></span>&nbsp;
                                        <span>2</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="show-review">
                            <span>Show all reviews</span>
                            <img class="img-arrow-down" src="{{ asset('images/arrow-down.png') }}">
                        </div>

                        <div>
                            <div class="info-users">
                                <img src="{{ asset('images/slack-mentor.png') }}">&ensp;
                                <span>Nam Hoang</span>&ensp;
                                <span> ★★★★★</span>
                                <span>August 4, 2020 at 1:30 pm</span>

                                <p class="review-users">Vivamus volutpat
                                    eros pulvinar velit
                                    laoreet, sit amet egestas erat
                                    dignissim. Sed quis rutrum tellus, sit
                                    amet viverra felis. Cras sagittis sem
                                    sit amet urna feugiat rutrum. Nam nulla
                                    ipsum, venenatis malesuada felis quis,
                                    ultricies convallis neque. Pellentesque
                                    tristique </p>
                            </div>

                        </div>
                        <div>
                            <div class="info-users">
                                <img src="{{ asset('images/slack-mentor.png') }}">&ensp;
                                <span>Nam Hoang</span>&ensp;
                                <span> ★★★★★</span>
                                <span>August 4, 2020 at 1:30 pm</span>

                                <p class="review-users">Vivamus volutpat
                                    eros pulvinar velit
                                    laoreet, sit amet egestas erat
                                    dignissim. Sed quis rutrum tellus, sit
                                    amet viverra felis. Cras sagittis sem
                                    sit amet urna feugiat rutrum. Nam nulla
                                    ipsum, venenatis malesuada felis quis,
                                    ultricies convallis neque. Pellentesque
                                    tristique </p>
                            </div>
                        </div>
                        <div class="m-3">
                            <div class="add-review leave-review my-3">Leave
                                a review</div>
                            <form method="POST">

                                <div class="message-add-review my-3">Message</div>
                                <input type="hidden" name="rating_value" class="rating_value">
                                <input type="hidden" name="course_id" value="">
                                <textarea name="content" id="content" cols="30" rows="5"
                                    class="form-control mb-3"></textarea>

                                <div
                                    class="vote-star-review d-flex
                                        align-items-center">
                                    <div class="add-review leave-review">vote</div>
                                    <div class="rating pt-2 px-3">
                                        <input class="rate" type="radio" name="rate" id="star-five"
                                            value="{{ config('variable.rate.five_star') }}"><label for="star-five">5
                                            stars</label>
                                        <input class="rate" type="radio" name="rate" id="star-four"
                                            value="{{ config('variable.rate.four_star') }}"><label for="star-four">4
                                            stars</label>
                                        <input class="rate" type="radio" name="rate" id="star-three"
                                            value="{{ config('variable.rate.three_star') }}"><label for="star-three">3
                                            stars</label>
                                        <input class="rate" type="radio" name="rate" id="star-two"
                                            value="{{ config('variable.rate.two_star') }}"><label for="star-two">2
                                            stars</label>
                                        <input class="rate" type="radio" name="rate" id="star-one"
                                            value="{{ config('variable.rate.one_star') }}"><label for="star-one">1
                                            stars</label>
                                    </div>
                                    <div class="message-add-review">
                                        (stars) </div>
                                </div>
                                <div class="d-flex justify-content-end
                                        mt-n3">
                                    <button type="submit" class="button-review">Send</button>
                                    <!-- <a data-target="#myModal"
                                                                                                        data-toggle="modal"
                                                                                                        id="btn-send"
                                                                                                        class="btn btn-learn px-4 my-4">Send</a> -->
                                    <input type="text" hidden name="id" value="">
                                </div>
                            </form>
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
