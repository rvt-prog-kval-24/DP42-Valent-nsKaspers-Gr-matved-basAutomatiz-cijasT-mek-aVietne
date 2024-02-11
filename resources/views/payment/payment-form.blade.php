@extends("layout")

@section('title') {{ __('Invoice Payment') }} @endsection

@section("main_content")
    <form action="{{ route('payment.execute', $invoice) }}" method="POST">
        @csrf

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-uppercase">
                            <strong>{{ __('Payment For Invoice') }}</strong>
                        </div>

                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="card_number" class="col-lg-3 col-form-label text-md-end">{{ __('Card Number') }}<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input id="card_number" type="text" class="form-control @error('card_number') is-invalid @enderror" name="card_number" value="{{ old('card_number') }}" autocomplete="off">
                                    @error('card_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="cardholder_name" class="col-lg-3 col-form-label text-md-end">{{ __('Cardholder Name') }}<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input id="cardholder_name" type="text" class="form-control @error('cardholder_name') is-invalid @enderror" name="cardholder_name" value="{{ old('cardholder_name') }}" autocomplete="off">
                                    @error('cardholder_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="expiry_date" class="col-lg-3 col-form-label text-md-end">{{ __('Expiry Date') }}<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input id="expiry_date" type="text" class="form-control @error('expiry_date') is-invalid @enderror" name="expiry_date" value="{{ old('expiry_date') }}" autocomplete="off">
                                    @error('expiry_date')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="security_code" class="col-lg-3 col-form-label text-md-end">{{ __('Security Code') }}<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input id="security_code" type="password" class="form-control @error('security_code') is-invalid @enderror" name="security_code" value="{{ old('security_code') }}" autocomplete="off">
                                    @error('security_code')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary text-uppercase">
                                {{ __('Pay') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
