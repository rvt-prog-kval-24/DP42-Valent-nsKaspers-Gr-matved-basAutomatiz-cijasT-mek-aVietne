@extends('admin-company-layout')

@section('main_content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-uppercase">
                        <div class="row">
                            <div class="col-lg-6 d-flex align-items-center">
                                <strong>{{ __('Invoices') }}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($invoices->count() > 0)
                            <table class="table table-bordered table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>{{ __('Reference') }}</th>
                                    <th>{{ __('Provider Name') }}</th>
                                    <th>{{ __('Client Name') }}</th>
                                    <th>{{ __('Paid') }}</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($invoices as $invoice)
                                    <tr>
                                        <td class="align-middle">{{ $invoice->reference }}</td>
                                        <td class="align-middle">{{ $invoice->provider_name }}</td>
                                        <td class="align-middle">{{ $invoice->client_name }}</td>
                                        <td class="align-middle text-center">{{ $invoice->paid ? '+' : '-' }}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a class="btn btn-primary btn-sm" href="{{ route('companies-admin.show', $invoice) }}">
                                                    {{ __('Show') }}
                                                </a>
                                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
                                                    <span class="visually-hidden">Toggle</span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" target="_blank" href="{{ route('companies-admin.show-pdf', $invoice) }}">{{ __('PDF') }}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            @if ($invoices->lastPage() > 1)
                                <hr>

                                <div class="mt-3">
                                    {!! $invoices->links('vendor.pagination.bootstrap-5') !!}
                                </div>
                            @endif
                        @else
                            <div class="text-center text-uppercase">{{ __('Currently there are no invoices.') }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
