{{-- @extends('layout')

@section('content')

    <form action="{{ route('contacts.submit') }}" method="POST">
        @csrf
        @method('POST')
        <div class="container">
            <div class="row justify-content-center">

                @if (session()->has('error'))
                    <div class="col-md-8">
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    </div>
                @endif

                @if (session()->has('success'))
                    <div class="col-md-8">
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-uppercase">
                            <strong>{{ __('Have any questions ?') }}</strong>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="email" class="col-lg-3 col-form-label text-md-end">{{ __('Email') }}<span
                                        class="text-danger"></span></label>
                                <div class="col-lg-6">
                                    <input id="email" type="text"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" autocomplete="off">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="question_text"
                                       class="col-lg-3 col-form-label text-md-end">{{ __('Question') }}<span
                                        class="text-danger"></span></label>
                                <div class="col-lg-6">
                                    <textarea id="question_text"
                                              class="form-control @error('question_text') is-invalid @enderror"
                                              name="question_text">{{ old('question_text') }}</textarea>
                                    @error('question_text')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary text-uppercase">
                                {{ __('Submit') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .container {
                max-width: 960px;
                margin: 0 auto;
                padding: 15px;
            }

            .card {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                transition: 0.3s;
                border-radius: 5px;
            }

            .card:hover {
                box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            }

            .card-header {
                background-color: #f1f1f1;
                padding: 10px;
                text-align: center;
                font-size: 18px;
                font-weight: bold;
            }

            .card-body {
                padding: 10px;
            }

            .btn-primary {
                background-color: #9d44e5;
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 6px 3px;
                cursor: pointer;
            }

        </style>


    </form>
@endsection --}}



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions</title>
    <link rel="stylesheet" href="{{asset("login-assets/styles.css")}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<div class="wrapper">
    <form action="{{ route('contacts.submit') }}" method="POST">
        @csrf
        @method('POST')

        @if (session()->has('error'))
            {{ session('error') }}
        @endif

        @if (session()->has('success'))
            {{ session('success') }}
        @endif

        <h1>Have any questions ?</h1>
        <div class="input-box">
            <input name="email" type="text" placeholder="Email" required>
            <i class='bx bxs-user'></i>

            @error('email')
                <strong>{{ $message }}</strong>
            @enderror

        </div>
        <div class="input-box">
            <textarea name="question_text" placeholder="Question" required></textarea>
            <i class='bx bx-question-mark'></i>

            @error('question_text')
                <strong>{{ $message }}</strong>
            @enderror

        </div>
        <button type="submit" class="btn">Send</button>
    </form>
</div>
</body>
</html>
