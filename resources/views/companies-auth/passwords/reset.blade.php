<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset password</title>
    <link rel="stylesheet" href="{{asset("login-assets/styles.css")}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<div class="wrapper">
    <form method="POST" action="{{ route('companies.reset_password') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">


        <h1>Reset password</h1>
        <div class="input-box">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
            <i class='bx bxs-user'></i>

            @error('email')
                <strong>{{ $message }}</strong>
            @enderror

        </div>
        <div class="input-box">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="password">
            <i class='bx bxs-lock-alt' ></i>

            @error('password')
                <strong>{{ $message }}</strong>
            @enderror


        </div>
        <div class="input-box">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="password confirmation">
            <i class='bx bxs-lock-alt' ></i>
        </div>
        <button type="submit" class="btn">Reset Password</button>


        <div class="main-link">
            <p>Return to <a href="{{route("main")}}">main page</a></p>
        </div>

    </form>
</div>
</body>
</html>
