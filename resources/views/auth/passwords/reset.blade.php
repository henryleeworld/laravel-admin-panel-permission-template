@extends('layouts.guest')

@section('content')
    <div class="col-md-6">
        <div class="card mb-4 mx-4">
            <div class="card-body p-4">
                <h1>{{ __('Reset Password') }}</h1>

                <form action="{{ route('password.update') }}" method="POST">
                    @csrf

                    <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="{{ asset('icons/coreui.svg#cil-envelope-open') }}"></use>
                    </svg></span>
                        <input class="form-control @error('email') is-invalid @enderror" type="text"
                               placeholder="{{ __('Email') }}" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="input-group mb-4"><span class="input-group-text">
                      <svg class="icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-lock-locked') }}"></use>
                      </svg></span>
                        <input class="form-control @error('password') is-invalid @enderror" type="password"
                               id="password" name="password"
                               placeholder="{{ __('Password') }}" required autocomplete="new-password">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="input-group mb-4"><span class="input-group-text">
                      <svg class="icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-lock-locked') }}"></use>
                      </svg></span>
                        <input class="form-control" type="password"
                               id="password-confirm" name="password_confirmation"
                               placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">
                        @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button class="btn btn-block btn-primary"
                            type="submit">{{ __('Reset Password') }}</button>
                </form>

            </div>
        </div>
    </div>
@endsection