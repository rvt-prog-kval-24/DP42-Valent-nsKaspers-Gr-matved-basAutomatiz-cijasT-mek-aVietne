@extends("layouts.app")

@section('title') {{ __('Invoice Payment') }} @endsection

@section("content")
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
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-uppercase">
                            <strong>{{ sprintf(__('Payment For Invoice: %s'), $invoice->reference) }}</strong>
                        </div>

                        <div class="card-body">
                           <table class="table">
                               <tr>
                                   <td>{{ __('Reference')  }}</td>
                                   <td>{{ $invoice->reference }}</td>
                               </tr>
                               <tr>
                                   <td>{{ __('Payment Sum')  }}</td>
                                   <td>{{ $invoice->getTotalPriceWithTax() }} EUR</td>
                               </tr>
                           </table>
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
