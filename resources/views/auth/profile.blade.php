@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ trans('cruds.my_profile.title') }}
        </div>

        <form action="{{ route('admin.profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body">

                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">{{ $message }}</div>
                @endif

                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                    </svg></span>
                    <input class="form-control" type="text" name="name" placeholder="{{ trans('cruds.my_profile.fields.name') }}"
                           value="{{ old('name', auth()->user()->name) }}" required>
                    @error('name')
                    <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="{{ asset('icons/coreui.svg#cil-envelope-open') }}"></use>
                    </svg></span>
                    <input class="form-control" type="text" name="email" placeholder="{{ trans('cruds.my_profile.fields.email') }}"
                           value="{{ old('email', auth()->user()->email) }}" required>
                    @error('email')
                    <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="{{ asset('icons/coreui.svg#cil-lock-locked') }}"></use>
                    </svg></span>
                    <input class="form-control @error('password') is-invalid @enderror" type="password"
                           name="password" placeholder="{{ trans('cruds.my_profile.fields.new_password') }}" required>
                    @error('password')
                    <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="input-group mb-4"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="{{ asset('icons/coreui.svg#cil-lock-locked') }}"></use>
                    </svg></span>
                    <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password"
                           name="password_confirmation" placeholder="{{ trans('cruds.my_profile.fields.new_password_confirmation') }}" required>
                </div>

            </div>

            <div class="card-footer">
                <button class="btn btn-sm btn-primary" type="submit">{{ __('Submit') }}</button>
            </div>

        </form>

    </div>
@endsection
