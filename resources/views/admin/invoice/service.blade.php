<div class="card mb-2 service-container">
    <div class="card-body">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="@if (empty($hideDelete)) col-md-5 @else col-md-6 @endif">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm generic-code @error(sprintf('%s.%s.name', $identifier, $code)) is-invalid @enderror" name="{{ $identifier }}[{{ $code }}][name]" value="{{ $name }}">
                    @error(sprintf('%s.%s.name', $identifier, $code))
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                    <label>{{ __('Name') }}</label>
                </div>
            </div>
            <div class="@if (empty($hideDelete)) col-md-5 @else col-md-6 @endif">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm generic-code @error(sprintf('%s.%s.price', $identifier, $code)) is-invalid @enderror" name="{{ $identifier }}[{{ $code }}][price]" value="{{ $price }}">
                    @error(sprintf('%s.%s.price', $identifier, $code))
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                    <label>{{ __('Price') }}</label>
                </div>
            </div>
            <div class="col-md-2">
                @if (empty($hideDelete))
                    <div class="btn btn-sm btn-danger w-100 remove-service">
                        {{ __('Delete') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
