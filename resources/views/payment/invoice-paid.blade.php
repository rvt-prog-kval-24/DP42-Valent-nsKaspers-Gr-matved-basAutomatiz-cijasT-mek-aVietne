@extends("layouts.app")

@section('title') {{ __('Invoice Payment') }} @endsection

@section("content")
    @if (session()->has('success'))
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-uppercase">
                        <strong>{{ sprintf(__('Payment For Invoice: %s'), $invoice->reference) }}</strong>
                    </div>

                    <div class="card-body">
                        <div class="row mb-3 p-4">
                            <h2 class="text-center">{{ __('Invoice has been paid!') }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
