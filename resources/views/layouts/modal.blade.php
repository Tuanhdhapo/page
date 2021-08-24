<div class="frame-login modal fade modal-dialog modal-dialog-centered" id="exampleModal" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="frame-loginn">
        <div class="modal-dialog">
            <div class="modal-content content">
                <div class="login-register">
                    <div id="tabs" class="tabs">
                        <img class="btn btn-secondary button-close" data-bs-dismiss="modal"
                            src="{{ asset('images/close.png') }}" alt="close">
                        <ul>
                            <li class="login"><a href="#tabs-login">
                                    <p class="active-tab" id="login-change">LOGIN</p>
                                </a></li>
                            <li class="register"><a href="#tabs-register">
                                    <p id="register-change">REGISTER</p>
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
