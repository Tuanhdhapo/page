<header class="header fixed">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-expand-md navbar-light">
            <a class="navbar-brand" href="{{route('home')}}">
                <div class="img-logo">
                    <p class="text-center">
                        <img src="{{ asset('images/logo.png') }}" alt="failimage" />
                    </p>
                </div>
            </a>
            <button class="navbar-toggler btn-menu" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false">
                <span class="navbar-toggler-icon" id="showHeader"></span>
                <span class="my-1 mx-1 close fa
                    fa-times" id="hideHeader"></span>
            </button>
            <div class="collapse navbar-collapse navbar-menu-div" id="navbarNav">
                <ul class="navbar-nav nav list-group" role="tablist">
                    <li class="nav-item item-menu">
                        <a class="nav-link text-center {{Route::is('home') ? 'active': ''}} " role="tab"  aria-selected="true"
                            href="{{ route('home') }}">HOME</a>
                    </li>
                    <li class="nav-item item-menu">
                        <a class="nav-link text-center {{Route::is('courses*') ? 'active': ''}}" role="tab" aria-selected="false"
                            href="{{ route('courses') }}">ALL COURSES</a>
                    </li>
                    <li class="nav-item item-menu list-courses">
                        <a class="nav-link text-center" role="tab"
                            href="#">LIST lESSON</a>
                    </li>
                    <li class="nav-item item-menu list-courses">
                        <a class="nav-link text-center" role="tab"
                            href="#">LESSON DETAIL</a>
                    </li>
                    @if (!Auth::check())
                        <li class="nav-item item-menu">
                            <a class="nav-link text-center" role="tab" data-bs-toggle="modal" id="btn-regis-login"
                                data-bs-target="#loginModal" href="#">LOGIN/REGISTER
                            </a>
                        </li>
                    @endif
                    <li class="nav-item item-menu">
                        <a class="nav-link text-center {{Route::is('profile') ? 'active': ''}}" role="tab" href="{{route('profile')}}"
                            onclick="hidenav()">PROFILE</a>
                    </li>
                    @if (Auth::check())
                        <li class="nav-item item-menu">
                            <a class="nav-link text-center" role="tab" href="/logout">LOGOUT</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>

@include('layouts.modal')
