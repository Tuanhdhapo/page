<header class="header fixed">
    <div class="containerr"> 
        <nav class="navbar navbar-expand-lg navbar-expand-md navbar-light">
            <a class="navbar-brand" href="#">
                <div class="img-logo">
                    <p class="text-center">
                        <img src="{{ asset('images/logo.png') }}" alt="failimage" />
                    </p>
                </div>
            </a>
            <button class="navbar-toggler btn-menu" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false">
                <span class="navbar-toggler-icon" id="showheader"></span>
                <span class="my-1 mx-1 close fa
                    fa-times" id="hideheader"></span>
            </button>
            <div class="collapse navbar-collapse navbar-menu-div" id="navbarNav">
                <ul class="navbar-nav nav" role="tablist">
                    <li class="nav-item item-menu">
                        <a class="nav-link text-center active" role="tab" data-toggle="pill" aria-selected="true"
                            href="#" >HOME</a>
                    </li>
                    <li class="nav-item item-menu">
                        <a class="nav-link text-center" aria-selected="false" data-toggle="pill" role="tab" 
                        href="#">ALL COURSES</a>
                    </li>
                    <li class="nav-item item-menu list-courses">
                        <a class="nav-link text-center" aria-selected="false" data-toggle="pill" role="tab"
                            href="#">LIST lESSON</a>  
                    </li>
                    <li class="nav-item item-menu list-courses">
                        <a class="nav-link text-center" aria-selected="false" data-toggle="pill" role="tab" 
                        href="#" >LESSON DETAIL</a>   
                    </li>
                    @if (!Auth::check())
                        <li class="nav-item item-menu">
                            <a class="nav-link text-center" role="tab" aria-selected="false" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" data-toggle="pill" href="#">LOGIN/REGISTER
                            </a>
                        </li>
                    @endif
                    <li class="nav-item item-menu">
                        <a class="nav-link text-center" role="tab" aria-selected="false" data-toggle="pill" href="#"
                            onclick="hidenav()">PROFILE</a>
                    </li>
                    @if (Auth::check())
                        <li class="nav-item item-menu">
                            <a class="nav-link text-center" role="tab" aria-selected="false" href="/logout">LOGOUT</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>

@include('layouts.modal')
