<div id="tabs-register"><br><br>
    <form class="login" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="input user-input"> <label>Username:</label><br>
            <input type="text" name="name" class="@error('name') is-invalid @enderror"><br>
        </div>
        @error('name')
            <div class=" alert-danger">{{ $message }}</div>
        @enderror
        <div class="input"> <label>Email:</label><br>
            <input type="email" name="email_user" class="@error('email_user') is-invalid @enderror"><br>
        </div>
        @error('email_user')
            <div class=" alert-danger">{{ $message }}</div>
        @enderror
        <div class="input"> <label>Password:</label><br>
            <input type="password" name="password_register"
                class="@error('password_register') is-invalid @enderror"><br>
        </div>
        @error('password_register')
            <div class=" alert-danger">{{ $message }}</div>
        @enderror
        <div class="input"> <label>Repeat
                Password:</label><br>
            <input type="password" name="password_confirmation"
                class="@error('password_confirmation') is-invalid @enderror"><br>
        </div>
        @error('password_confirmation')
            <div class=" alert-danger">{{ $message }}</div>
        @enderror
        <p class="text-center">
            <button type="submit" class="btn
                    btn-primary login-hapo
                    login-registers">Register</button>
        </p>
    </form>
</div>
