@extends('admin-layout')

@section('main_content')
    <form action="{{ route('admin.companies.update', $company) }}" enctype="multipart/form-data" method="POST">
        @method('PATCH')
        @csrf
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-uppercase">
                            <div class="row">
                                <div class="col-lg-6 d-flex align-items-center">
                                    <strong>{{ __('Update Company') }}</strong>
                                </div>
                                <div class="col-lg-6 text-end">
                                    <a href="{{ route('admin.companies.index') }}" class="btn btn-primary">
                                        {{ __('Return to Companies') }}
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="name" class="col-lg-3 col-form-label text-md-end">{{ __('Name') }}<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $company->name) }}" autocomplete="off">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="reg_number" class="col-lg-3 col-form-label text-md-end">{{ __('Reg. Number') }}<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input id="reg_number" type="text" class="form-control @error('reg_number') is-invalid @enderror" name="reg_number" value="{{ old('reg_number', $company->reg_number) }}" autocomplete="off">
                                    @error('reg_number')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="vat_number" class="col-lg-3 col-form-label text-md-end">{{ __('VAT Number') }}<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input id="vat_number" type="text" class="form-control @error('vat_number') is-invalid @enderror" name="vat_number" value="{{ old('vat_number', $company->vat_number) }}" autocomplete="off">
                                    @error('vat_number')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-lg-3 col-form-label text-md-end">{{ __('Email') }}<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $company->email) }}" autocomplete="off">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-lg-3 col-form-label text-md-end">{{ __('Password') }}</label>
                                <div class="col-lg-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="" autocomplete="off">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone" class="col-lg-3 col-form-label text-md-end">{{ __('Phone') }}<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $company->phone) }}" autocomplete="off">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="address" class="col-lg-3 col-form-label text-md-end">{{ __('Address') }}<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address" autocomplete="off">{{ old('address', $company->address) }}</textarea>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="api_code" class="col-lg-3 col-form-label text-md-end">{{ __('API Code') }}</label>
                                <div class="col-lg-6">
                                    <input id="api_code" type="text" class="form-control @error('api_code') is-invalid @enderror" name="api_code" value="{{ old('api_code', $company->api_code) }}" autocomplete="off">
                                    @error('api_code')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-lg-3 col-form-label text-md-end">{{ __('Description') }}</label>
                                <div class="col-lg-6">
                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="off">{{ old('description', $company->description) }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary text-uppercase">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
