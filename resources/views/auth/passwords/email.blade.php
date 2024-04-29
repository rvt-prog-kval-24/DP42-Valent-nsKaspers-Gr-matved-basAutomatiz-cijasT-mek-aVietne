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
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <h1>Reset password</h1>
        <div class="input-box">
            <input type="text" name="email" placeholder="Email" required>
            <i class='bx bxs-user'></i>

            @error('email')
            <strong>{{ $message }}</strong>
            @enderror

        </div>
        <button type="submit" class="btn">Send Password Reset Link</button>


        <div class="main-link">
            <p>Return to <a href="{{route("main")}}">main page</a></p>
        </div>

    </form>
</div>
</body>
</html>
