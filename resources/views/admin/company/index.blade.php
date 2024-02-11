@extends('admin-layout')

@section('main_content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-uppercase">
                        <div class="row">
                            <div class="col-lg-6 d-flex align-items-center">
                                <strong>{{ __('Companies') }}</strong>
                            </div>
                            <div class="col-lg-6 text-end">
                                <a href="{{ route('admin.companies.create') }}" class="btn btn-primary">
                                    {{ __('Create') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($companies->count() > 0)
                            <table class="table table-bordered table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Phone') }}</th>
                                    <th>{{ __('Address') }}</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($companies as $company)
                                    <tr>
                                        <td class="align-middle">{{ $company->name }}</td>
                                        <td class="align-middle">{{ $company->email }}</td>
                                        <td class="align-middle">{{ $company->phone }}</td>
                                        <td class="align-middle">{{ $company->address }}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a class="btn btn-primary btn-sm" href="{{ route('admin.companies.edit', $company) }}">
                                                    {{ __('Edit') }}
                                                </a>
                                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
                                                    <span class="visually-hidden">Toggle</span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <form action="{{ route('admin.companies.destroy', $company) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="dropdown-item">{{ __('Delete') }}</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            @if ($companies->lastPage() > 1)
                                <hr>

                                <div class="mt-3">
                                    {!! $companies->links('vendor.pagination.bootstrap-5') !!}
                                </div>
                            @endif
                        @else
                            <div class="text-center text-uppercase">{{ __('Currently there are no companies.') }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
