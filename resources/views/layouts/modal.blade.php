<div class="frame-login modal fade modal-dialog" id="loginModal" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="frame-loginn">
        <div class="modal-dialog">
            <div class="modal-content content">
                <div class="login-register">
                    <div id="tabs" class="tabs">
                        <img class="btn btn-secondary button-close" data-bs-dismiss="modal"
                            src="{{ asset('images/close.png') }}" alt="close">
                        <ul>
                            <li class="login"><a id="navLogin" href="#tabsLogin">
                                    <p class="active-tab" id="loginChange">LOGIN</p>
                                </a></li>
                            <li class="register"><a href="#tabs-register">
                                    <p id="registerChange">REGISTER</p>
                                </a></li>
                        </ul>
                        <div class="container tabs-container">
                            @include('auth.login')
                            @include('auth.register')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
