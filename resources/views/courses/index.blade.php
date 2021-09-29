@extends('layouts.app')

@section('content')

<section class="all-course">
    <div class="list-course container">
        <form class="form-inline" action="{{ route('courses/search') }}" method="GET">
            <div class="search-course">
                <div id="showFilter">
                    <div class="filter-button">
                        <img src="{{ asset('images/fiter.PNG') }}" alt="filte">
                        <p> filter</p>
                    </div>
                </div>
                <div class="search">
                    <input class="search-input" type="search" name="search_form_input"
                        placeholder="Search..." aria-label="Search" @if (isset($keyword)) value={{ $keyword }} @endif>
                    <img src="{{ asset('images/glass.png') }}" alt="glass">
                </div>
                <div class="search-button">
                    <button type="submit"
                        class="btn btn-primary
                                search-button">Search</button>
                </div>
            </div>
            <div id="filter" class="search-filter">
                <div class="filter-one-way">
                    <div class="row p-0 row-filter-one">
                        <div class="col-sm-1 col-txt-filter">
                            <p class="txt-filter">Filter</p>
                        </div>
                        <div class="col-sm-3 btn-latest-oldest">
                            <input type="radio" class="btn-check inp-filter"
                                value="{{ config('constants.options.newest') }}" name="sort" id="success-outlined"
                                {{ request('sort') == "config('constants.options.newest')" ? 'checked' : '' }}>
                            <label class="btn btn-latest label-radio " id="success-outlined"
                                for="success-outlined">Latest</label>

                            <input type="radio" class="btn-check inp-filter"
                                value="{{ config('constants.options.oldest') }}" name="sort" id="danger-outlined"
                                {{ request('sort') == "config('constants.options.oldest')" ? 'checked' : '' }}>
                            <label class="btn btn-oldest label-radio" id="danger-outlined"
                                for="danger-outlined">Oldest</label>
                        </div>

                        <div class="col-sm-2 select-filter select-teacher ">
                            <select name="mentor" id="select-teacher" class="js-states form-control inp-filter">
                                <option value="">Teacher</option>
                                @foreach ($mentors as $item)
                                    <option value="{{ $item->id }}" @if ($item->id == request('mentor')) selected @endif>
                                        {{ $item->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-sm-2 select-filter">
                            <select name="learner" id="select-learner" class="js-states form-control inp-filter">
                                <option value="">Learner</option>
                                <option value="{{ config('constants.options.ascending') }}" @if (request('learner') == config('constants.options.ascending')) selected @endif>
                                    Ascending
                                </option>
                                <option value="{{ config('constants.options.decrease') }}" @if (request('learner') == config('constants.options.decrease')) selected @endif>
                                    Decrease
                                </option>
                            </select>
                        </div>
                        <div class="col-sm-2 select-filter">
                            <select name="times" id="select-time" class="js-states form-control inp-filter">
                                <option value="">Time</option>
                                <option value="{{ config('constants.options.ascending') }}" @if (request('times') == config('constants.options.ascending')) selected @endif>
                                    Ascending
                                </option>
                                <option value="{{ config('constants.options.decrease') }}" @if (request('times') == config('constants.options.decrease')) selected @endif>
                                    Decrease
                                </option>
                            </select>
                        </div>
                        <div class="col-sm-2 select-filter">
                            <select name="lessons" id="select-lessons" class="js-states form-control inp-filter">
                                <option value="">Lessons</option>
                                <option value="{{ config('constants.options.ascending') }}" @if (request('lessons') == config('constants.options.ascending')) selected @endif>
                                    Ascending
                                </option>
                                <option value="{{ config('constants.options.decrease') }}" @if (request('lessons') == config('constants.options.decrease')) selected @endif>
                                    Decrease
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row p-0 m-0 ">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-2 select-filter ">
                        <select name="tags" id="select-tags" class="js-states form-control inp-filter row-filter-two">
                            <option value="">Tags</option>
                            @foreach ($tags as $item)
                                <option value="{{ $item->id }}" @if ($item->id == request('tags')) selected @endif>{{ $item->content }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2 select-filter ">
                        <select name="review" id="select-review"
                            class="js-states form-control inp-filter row-filter-two">
                            <option value="">Review</option>
                            <option value="{{ config('constants.options.ascending') }}" @if (request('review') == config('constants.options.ascending')) selected @endif>
                                Ascending
                            </option>
                            <option value="{{ config('constants.options.decrease') }}" @if (request('review') == config('constants.options.decrease')) selected @endif>
                                Decrease
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </form>

        <div class="row row-course">
            @foreach ($courses as $course)
                @include('courses.course');
            @endforeach
        </div>
        
        <div class="link-course">
            {{ $courses->appends($_GET)->links('pagination::bootstrap-4') }}
        </div>
    </div>
</section>

@endsection
