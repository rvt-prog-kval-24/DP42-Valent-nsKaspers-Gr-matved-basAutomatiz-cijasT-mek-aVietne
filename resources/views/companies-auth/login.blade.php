<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset("login-assets/styles.css")}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<div class="wrapper">
    <form method="POST" action="{{ route('companies.login') }}">
        @csrf
        <h1>Login</h1>
        <div class="input-box">
            <input placeholder="Email" type="email"  name="email" value="{{ old('email') }}" required>
            <i class='bx bxs-user'></i>
            @error('email')
            <hr>
            <span>{{ $message }}</span>
            @enderror
        </div>
        <div class="input-box">
            <input type="password" name="password" placeholder="Password" required>
            <i class='bx bxs-lock-alt' ></i>
            @error('password')
            <hr>
            <span>{{ $message }}</span>
            @enderror
        </div>
        <div class="remember-forgot">
            <label><input id="remember_me" name="remember_me" type="checkbox">Remember Me</label>
            <a href="{{ route('companies.show_password_link_request_form') }}">Forgot Password</a>
        </div>
        <button type="submit" class="btn">Login</button>

        <div class="main-link">
            <p>Return to <a href="{{route("main")}}">main page</a></p>
        </div>

    </form>
</div>
</body>
</html>
