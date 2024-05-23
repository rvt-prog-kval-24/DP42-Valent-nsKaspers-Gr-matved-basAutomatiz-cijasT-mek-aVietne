@extends('admin-company-layout')

@section('main_content')
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header text-uppercase">
                                <div class="row">
                                    <div class="col-lg-6 d-flex align-items-center">
                                        <strong>{{ __('Show Invoice') }}</strong>
                                    </div>
                                    <div class="col-lg-6 text-end">
                                        <a href="{{ route('companies-admin.index') }}" class="btn btn-primary">
                                            {{ __('Return to Invoices') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form>
                                    <fieldset disabled>
                                        <div class="row mb-3">
                                            <label for="company_id" class="col-lg-3 col-form-label text-md-end">{{ __('Company') }}</label>
                                            <div class="col-lg-6">
                                                <select id="company_id" class="form-control form-select" name="company_id">
                                                    @foreach($companies as $company)
                                                        <option {{ $company->company_id == $company->id ? 'selected' : '' }} value="{{ $company->id }}">{{ $company->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="tax_rate" class="col-lg-3 col-form-label text-md-end">{{ __('Tax Rate') }}</label>
                                            <div class="col-lg-6">
                                                <input id="tax_rate" type="text" class="form-control" name="tax_rate" value="{{ $invoice->tax_rate }}" autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header">{{ __('Client') }}</div>
                                            <div class="card-body">


                                                <div class="row mb-3">
                                                    <label for="client_type" class="col-lg-3 col-form-label text-md-end">{{ __('Client Type') }}</label>
                                                    <div class="col-lg-6">
                                                        <select id="client_type" class="form-control form-select" name="client_type">
                                                            @foreach($clientTypes as $clientTypeCode => $clientTypeTitle)
                                                                <option {{ $invoice->client_type == $clientTypeCode ? 'selected' : '' }} value="{{ $clientTypeCode }}">{{ $clientTypeTitle }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="client_name" class="col-lg-3 col-form-label text-md-end">{{ __('Client Name') }}</label>
                                                    <div class="col-lg-6">
                                                        <input id="client_name" type="text" class="form-control" name="client_name" value="{{ $invoice->client_name }}" autocomplete="off">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="client_email" class="col-lg-3 col-form-label text-md-end">{{ __('Client Email') }}</label>
                                                    <div class="col-lg-6">
                                                        <input id="client_email" type="text" class="form-control" name="client_email" value="{{ $invoice->client_email }}" autocomplete="off">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="client_phone" class="col-lg-3 col-form-label text-md-end">{{ __('Client Phone') }}</label>
                                                    <div class="col-lg-6">
                                                        <input id="client_phone" type="text" class="form-control" name="client_phone" value="{{ $invoice->client_phone }}" autocomplete="off">
                                                    </div>
                                                </div>

                                                <div id="legal-entity-container" @if ($invoice->client_type != 2) class="d-none" @endif>
                                                    <div class="row mb-3">
                                                        <div class="col-12">
                                                            <hr>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="client_company" class="col-lg-3 col-form-label text-md-end">{{ __('Client Company') }}</label>
                                                        <div class="col-lg-6">
                                                            <input id="client_company" type="text" class="form-control" name="client_company" value="{{ $invoice->client_company }}" autocomplete="off">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="client_vat_number" class="col-lg-3 col-form-label text-md-end">{{ __('Client VAT Number') }}</label>
                                                        <div class="col-lg-6">
                                                            <input id="client_vat_number" type="text" class="form-control" name="client_vat_number" value="{{ $invoice->client_vat_number }}" autocomplete="off">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="client_reg_number" class="col-lg-3 col-form-label text-md-end">{{ __('Client Reg. Number') }}</label>
                                                        <div class="col-lg-6">
                                                            <input id="client_reg_number" type="text" class="form-control" name="client_reg_number" value="{{ $invoice->client_reg_number }}" autocomplete="off">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="client_iban" class="col-lg-3 col-form-label text-md-end">{{ __('Client IBAN') }}</label>
                                                        <div class="col-lg-6">
                                                            <input id="client_iban" type="text" class="form-control" name="client_iban" value="{{ $invoice->client_iban }}" autocomplete="off">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="client_swift" class="col-lg-3 col-form-label text-md-end">{{ __('Client SWIFT') }}</label>
                                                        <div class="col-lg-6">
                                                            <input id="client_swift" type="text" class="form-control" name="client_swift" value="{{ $invoice->client_swift }}" autocomplete="off">
                                                            @error('client_swift')
                                                            <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card mt-3">
                                            <div class="card-header">
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-lg-6">
                                                        {{ __('Services') }}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body" id="services-container">
                                                @foreach($invoice->invoiceServices->reverse() as $service)
                                                    @include('admin.invoice.service', [
                                                        'identifier' => 'services',
                                                        'code' => $service->id,
                                                        'name' => $service->name,
                                                        'price' => $service->price,
                                                        'hideDelete' => true
                                                    ])
                                                @endforeach
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection
