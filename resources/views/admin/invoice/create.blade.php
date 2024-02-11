@extends('admin-layout')

@section('main_content')
    <form action="{{ route('admin.invoices.store') }}" method="POST">
        @csrf
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-uppercase">
                            <div class="row">
                                <div class="col-lg-6 d-flex align-items-center">
                                    <strong>{{ __('Create Invoice') }}</strong>
                                </div>
                                <div class="col-lg-6 text-end">
                                    <a href="{{ route('admin.invoices.index') }}" class="btn btn-primary">
                                        {{ __('Return to Invoices') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="row mb-3">
                                <label for="company_id" class="col-lg-3 col-form-label text-md-end">{{ __('Company') }}<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <select id="company_id" class="form-control form-select @error('company_id') is-invalid @enderror" name="company_id">
                                        @foreach($companies as $company)
                                            <option {{ old('company_id') == $company->id ? 'selected' : '' }} value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('company_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tax_rate" class="col-lg-3 col-form-label text-md-end">{{ __('Tax Rate') }}<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input id="tax_rate" type="text" class="form-control @error('tax_rate') is-invalid @enderror" name="tax_rate" value="{{ old('tax_rate') }}" autocomplete="off">
                                    @error('tax_rate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">{{ __('Client') }}</div>
                                <div class="card-body">


                                    <div class="row mb-3">
                                        <label for="client_type" class="col-lg-3 col-form-label text-md-end">{{ __('Client Type') }}<span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <select id="client_type" class="form-control form-select @error('client_type') is-invalid @enderror" name="client_type">
                                                @foreach($clientTypes as $clientTypeCode => $clientTypeTitle)
                                                    <option {{ old('client_type') == $clientTypeCode ? 'selected' : '' }} value="{{ $clientTypeCode }}">{{ $clientTypeTitle }}</option>
                                                @endforeach
                                            </select>
                                            @error('client_type')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="client_name" class="col-lg-3 col-form-label text-md-end">{{ __('Client Name') }}<span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input id="client_name" type="text" class="form-control @error('tax_rate') is-invalid @enderror" name="client_name" value="{{ old('client_name') }}" autocomplete="off">
                                            @error('client_name')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="client_email" class="col-lg-3 col-form-label text-md-end">{{ __('Client Email') }}<span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input id="client_email" type="text" class="form-control @error('client_email') is-invalid @enderror" name="client_email" value="{{ old('client_email') }}" autocomplete="off">
                                            @error('client_email')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="client_phone" class="col-lg-3 col-form-label text-md-end">{{ __('Client Phone') }}<span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input id="client_phone" type="text" class="form-control @error('client_phone') is-invalid @enderror" name="client_phone" value="{{ old('client_phone') }}" autocomplete="off">
                                            @error('client_phone')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div id="legal-entity-container" @if (old('client_type') != 2) class="d-none" @endif>
                                        <div class="row mb-3">
                                            <div class="col-12">
                                                <hr>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="client_company" class="col-lg-3 col-form-label text-md-end">{{ __('Client Company') }}<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input id="client_company" type="text" class="form-control @error('client_company') is-invalid @enderror" name="client_company" value="{{ old('client_company') }}" autocomplete="off">
                                                @error('client_company')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="client_vat_number" class="col-lg-3 col-form-label text-md-end">{{ __('Client VAT Number') }}<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input id="client_vat_number" type="text" class="form-control @error('client_vat_number') is-invalid @enderror" name="client_vat_number" value="{{ old('client_vat_number') }}" autocomplete="off">
                                                @error('client_vat_number')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="client_reg_number" class="col-lg-3 col-form-label text-md-end">{{ __('Client Reg. Number') }}<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input id="client_reg_number" type="text" class="form-control @error('client_reg_number') is-invalid @enderror" name="client_reg_number" value="{{ old('client_reg_number') }}" autocomplete="off">
                                                @error('client_reg_number')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="client_iban" class="col-lg-3 col-form-label text-md-end">{{ __('Client IBAN') }}<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input id="client_iban" type="text" class="form-control @error('client_iban') is-invalid @enderror" name="client_iban" value="{{ old('client_iban') }}" autocomplete="off">
                                                @error('client_iban')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="client_swift" class="col-lg-3 col-form-label text-md-end">{{ __('Client SWIFT') }}<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input id="client_swift" type="text" class="form-control @error('client_swift') is-invalid @enderror" name="client_swift" value="{{ old('client_swift') }}" autocomplete="off">
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

                            @error('services')
                                <div class="alert alert-danger mt-3">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="card mt-3">
                                <div class="card-header">
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <div class="col-lg-6">
                                            {{ __('Services') }}
                                        </div>
                                        <div class="col-lg-6 text-end">
                                            <div class="btn btn-sm btn-success" id="add-service">
                                                {{ __('Add Service') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body" id="services-container">
                                    @if (is_array(old('services')) && !empty(old('services')))
                                        @foreach(old('services') as $serviceCode => $service)
                                            @include('admin.invoice.service', [
                                                'identifier' => 'services',
                                                'code' => $serviceCode,
                                                'name' => isset($service['name']) && is_scalar($service['name']) ? $service['name'] : '',
                                                'price' => isset($service['price']) && is_scalar($service['price']) ? $service['price'] : '',
                                            ])
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary text-uppercase">
                                {{ __('Create') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <template id="service-template">
        @include('admin.invoice.service', ['identifier' => 'services', 'code' => '@', 'name' => '', 'price' => ''])
    </template>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const legalEntityCode = 2;

            document.addEventListener('click', (event) => {
                if (event.target.classList.contains('remove-service')) {
                    event.target.closest('.service-container').remove();
                }
            });

            document.querySelector('#add-service')?.addEventListener('click', () => {
                const service = document.querySelector('#service-template').content.cloneNode(true);

                const code = uuidv4();
                service.querySelectorAll('.generic-code').forEach((elem) => {
                    elem.setAttribute('name', elem.getAttribute('name').replace('@', code));
                });

                document.querySelector('#services-container').append(service);
            });

            document.querySelector('#client_type')?.addEventListener('change', (event) => {
                const selectedCode = parseInt(event.target.value);
                const legalEntityContainer = document.querySelector('#legal-entity-container');

                if (selectedCode === legalEntityCode) {
                    legalEntityContainer.classList.remove('d-none');
                } else {
                    legalEntityContainer.classList.add('d-none');
                }
            });


            function uuidv4() {
                return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'
                    .replace(/[xy]/g, function (c) {
                        const r = Math.random() * 16 | 0,
                            v = c == 'x' ? r : (r & 0x3 | 0x8);
                        return v.toString(16);
                    });
            }
        });
    </script>
@endsection
