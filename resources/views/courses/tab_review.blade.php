<div class="container-fluid review-container">
    <div class="row total-review-container">
        <p class="total-review-txt"></p>
    </div>
    <hr>
    <div class="row show-star">
        <div  class="col-lg-4 col-star-left">
            <div class="avg-txt text-center">
                <p>{{ $course->avg_rating }}</p>
            </div>
            <div class="avg-star text-center star-show">
                @for ($i = 0; $i < $course->avg_rating; $i++)
                    <i class="fas fa-star checked"></i>
                @endfor
                @for ($i = 0; $i < 5 - $course->avg_rating; $i++)
                    <i class="fas fa-star"></i>
                @endfor
            </div>
            <div class="total-rating text-center">
                <p class="total-rating-txt"></p>
            </div>
        </div>
        <div class="col-lg-8 col-star-right">
            <div  class="rating-chart-container">
                @foreach ($course->number_rate as $star )
                <div class="row rating-chart justify-content-around">
                    <div class="col-lg-2 pr-0 text-center align-self-center number-start">{{$star->rate}}</div>
                    <div class="col-lg-9 p-0 text-center align-self-center">
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar"
                                style="width: {{ $course->reviews > 0 ? ($star->total / $course->reviews) * 100 : 0 }}%"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="col-lg-1 pl-0 text-center align-self-center total-star-rating">{{ $star->total }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <hr>
    <div class="col-lg-12 show-all-reviews">
        <p>Show all reviews <i class="fas fa-sort-down"></i></p>
    </div>
    <div class="row show-cmt-container">
        @foreach ($course->feedback as $review)
            <div class="col-lg-12 show-comment-user">
                <div class=" d-flex comment-header justify-content-start align-items-center ">
                    <div  class="ava-user-cmt">
                        <img  src="{{ $review->users->img_path }}" alt="avatar user">
                    </div>
                    <div class="name-user-cmt ">
                        <p>{{ $review->users->name }}</p>
                    </div>
                    <div class="star-user-rating ">
                        @for ($i = 0; $i < $review->rate; $i++)
                            <i class="fas fa-star checked"></i>
                        @endfor
                        @for ($i = 0; $i < 5 - $review->rate; $i++)
                            <i class="fas fa-star"></i>
                        @endfor
                    </div>
                    <div class="time-user-cmt ">
                        <p>{{ $review->created_at }}</p>
                    </div>
                </div>
                <div class="row comment-body justify-content-start align-items-center">
                    <p>{{ $review->content }}</p>
                </div>
                {{-- <div class="row btn-reply-comment m-0 justify-content-end align-items-center">
                    <a href="#" class="btn-reply" data-id="{{ $review->id }}" onclick="return false">Reply</a>
                </div>
                <div data-id="{{ $review->id }}"
                    class="row reply-comment-container justify-content-end align-items-center">
                    @foreach ($replies as $reply)
                        @if ($reply->feedback_id == $review->id)
                            <div class="col-lg-11">
                                <hr>
                                <div class="comment-header row reply-comment-main align-items-center">
                                    <div class="ava-user-cmt text-center">
                                        <img src="{{ asset('storage/avatar_user/' . $reply->img_path) }}"
                                            alt="avatar user">
                                    </div>
                                    <div class="name-user-cmt text-center">
                                        <p>{{ $reply->name }}</p>
                                    </div>
                                    <div class="time-user-cmt text-center">
                                        <p>{{ $reply->created_at }}</p>
                                    </div>
                                </div>
                                <div class="row pl-0 comment-body reply-comment-body">
                                    <p>{{ $reply->content }}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="row justify-content-end align-items-center">
                    <div class="col-lg-11 input-reply-container">
                        <form class="form-reply-comment {{ $review->id }}">
                            @csrf
                            <br>
                            <textarea name="review" data-id="{{ $review->id }}"
                                class="form-control input-reply-comment" rows="4"></textarea>
                            <br>
                            <input type="hidden" data-id="{{ $review->id }}" value="{{ $review->id }}"
                                class="review-id-reply">
                            <input type="hidden" data-id="{{ $review->id }}"
                                value="{{ Auth::check() ? Auth::user()->id : '' }}" class="user-id-reply">
                            <input class="btn-sent-reply" data-id="{{ $review->id }}" type="submit" value="Send">
                        </form>
                    </div>
                </div>
                <hr> --}}
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-lg-12 leave-review-txt">
            <p>Leave a Review</p>
        </div>
        <div class="col-lg-12 input-review-container">
            <form id="form-review">
                @csrf
                <label class="label-input-review" for="input-review-course">Message</label>
                <textarea name="review" id="input-review-course" class="form-control" rows="10"></textarea>
                <div class="m-0 d-flex">
                    <div class="align-self-center vote-txt">
                        <p>Vote</p>
                    </div>
                    <div  class="align-self-center input-star-rating rate">
                        <input class="rate" type="radio" name="rate" id="star-five" value="5"><label
                            for="star-five">5
                            stars</label>
                        <input class="rate" type="radio" name="rate" id="star-four" value="4"><label
                            for="star-four">4
                            stars</label>
                        <input class="rate" type="radio" name="rate" id="star-three" value="3"><label
                            for="star-three">3
                            stars</label>
                        <input class="rate" type="radio" name="rate" id="star-two" value="2"><label
                            for="star-two">2
                            stars</label>
                        <input class="rate" type="radio" name="rate" id="star-one" value="1"><label
                            for="star-one">1
                            stars</label>
                    </div>

                    <div class="star-review">(stars)</div>
                </div>
                 <div class="col-lg-9 text-right align-self-center">
                        <span class="err-review">Bạn cần điền đầy đủ trước khi gửi !</span>
                    </div>
                <input type="hidden" name="courseId" id="course-id" value="{{ $course->id }}">
                <input type="hidden" name="lessonId" id="lesson-id" value="">
                <input type="hidden" name="userId" id="user-id" @if (Auth::check()) value="{{ Auth::user()->id }} @endif ">
                <div class="  row m-0 btn-send-review justify-content-end">
                    <input type="submit" id="btn-send-review" value="Send">
                </div>
            </form>
        </div>
    </div>
</div>
