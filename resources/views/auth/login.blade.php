<div id="tabs-login"><br>
    <form class="login" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="input">
            <label>Username:</label><br>
            <input type="email" name="email" class="@error('email') is-invalid @enderror"> <br>
        </div>
        @error('email')
            <div class=" alert-danger">{{ $message }}</div>
        @enderror
        <div class="input">
            <label>Password:</label><br>
            <input type="password" name="password" class="@error('password') is-invalid @enderror"><br>
        </div>
        @error('password')
            <div class=" alert-danger">{{ $message }}</div>
        @enderror
        <div class="login-check">
            <input type="checkbox" class="form-check-input remember-me-login-checkbox" id="remember-me-login-checkbox">
            <label class="form-check-label remember-me-label rememberme"
                for="remember-me-login-checkbox">Rememberme</label>
            <label><a class="forgot" href="">Forgot password</a></label><br>
        </div>
        <div>
            <p class="text-center">
                <button type="submit" class="btn btn-primary login-hapo">LOGIN</button>
            </p>
        </div>
        <div class="line-login">
            <span class="login-with">Login with</span>
        </div>
        <p class="text-center">
            <button type="button" class="btn btn-primary facebook"><img class="img-gg"
                    src="{{ asset('images/google.png') }}" alt="facebook"><img class="img-gg"
                    src="{{ asset('images/vectort.png') }}" alt="google">Google</button>
        </p>
        <p class="text-center">
            <button type="buton" class="btn btn-primary google"><img class="img-fb"
                    src="{{ asset('images/facebook.png') }}" alt="button-facebook">Facebook</button>
        </p>
    </form>
</div>
