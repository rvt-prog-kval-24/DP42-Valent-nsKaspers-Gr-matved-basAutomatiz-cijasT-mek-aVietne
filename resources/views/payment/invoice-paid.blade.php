@extends("layout")

@section('title') {{ __('Invoice Payment') }} @endsection

@section("main_content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-success">
                    <div class="card-header text-uppercase">
                        <strong>{{ __('Payment For Invoice') }}</strong>
                    </div>

                    <div class="card-body">
                        <div class="row mb-3">
                            {{ sprintf(__('Invoice %s has already been paid!'), $invoice->reference) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
