@extends("layout")

@section('title') {{ __('Invoice Payment') }} @endsection

@section("content")
    <div class="container">
        <div class="project-card" style="margin: 50px">
            <div class="card-content">
                <form action="{{ route('payment.execute', $invoice) }}" method="POST">
                    @csrf


                    @if (session()->has('error'))
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="alert alert-danger">
                                        {{ session()->get('error') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

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
                        <div class="row justify-content-center" style="text-align: center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header text-uppercase">
                                        <strong>{{ sprintf(__('Payment For Invoice: %s'), $invoice->reference) }}</strong>
                                    </div>

                                    <div class="card-body">
                                        <div>{{ __('Reference: ')  }}
                                            {{ $invoice->reference }}</div>
                                        <div>{{ __('Payment Sum: ')  }}
                                            {{ $invoice->getTotalPriceWithTax() }} EUR </div>

                                    </div>
                                    <br>
                                    <div class="card-footer text-end">
                                        <button type="submit" class="btn btn-primary text-uppercase" style="background-color: #007bff; border-color: #007bff; color: white; margin: 0 auto;">
                                            {{ __('Pay') }}
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
