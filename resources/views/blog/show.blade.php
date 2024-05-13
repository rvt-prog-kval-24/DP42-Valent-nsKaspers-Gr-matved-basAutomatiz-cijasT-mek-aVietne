@extends('layout')

@section('content')

    <br>
    <br>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h2 class="display-4 fw-normal text-center mb-4">{{ $post->title }}</h2>

                <div class="card mt-3">
                    <div class="card-header text-center">
                        {{ $post->created_at }}
                    </div>
                    <div class="card-body p-5 lead">
                        <img class="float-start img-fluid pe-3" src="{{ $post->getImageFullUrl() }}" alt="image">
                        {!! nl2br($post->text) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
@endsection
