@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="user_name" class="col-md-4 col-form-label text-md-right">{{ __('user_name') }}</label>

                            <div class="col-md-6">
                                <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>

                                @error('user_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('city') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="city" class="form-control @error('city') is-invalid @enderror" name="city" required autocomplete="new-city">

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="new-address">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sex" class="col-md-4 col-form-label text-md-right">{{ __('sex') }}</label>

                            <div class="col-md-6">
                                <input id="sex" type="sex" class="form-control @error('sex') is-invalid @enderror" name="sex" required autocomplete="new-sex">

                                @error('sex')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="new-phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('first_name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="first_name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" required autocomplete="new-first_name">

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="middle_name" class="col-md-4 col-form-label text-md-right">{{ __('middle_name') }}</label>

                            <div class="col-md-6">
                                <input id="middle_name" type="middle_name" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" required autocomplete="new-middle_name">

                                @error('middle_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('last_name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="last_name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" required autocomplete="new-last_name">

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mother_name" class="col-md-4 col-form-label text-md-right">{{ __('mother_name') }}</label>

                            <div class="col-md-6">
                                <input id="mother_name" type="mother_name" class="form-control @error('mother_name') is-invalid @enderror" name="mother_name" required autocomplete="new-mother_name">

                                @error('mother_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dateofbirth" class="col-md-4 col-form-label text-md-right">{{ __('dateofbirth') }}</label>

                            <div class="col-md-6">
                                <input id="dateofbirth" type="dateofbirth" class="form-control @error('dateofbirth') is-invalid @enderror" name="dateofbirth" required autocomplete="new-dateofbirth">

                                @error('dateofbirth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="acount_status" class="col-md-4 col-form-label text-md-right">{{ __('acount_status') }}</label>

                            <div class="col-md-6">
                                <input id="acount_status" type="acount_status" class="form-control @error('acount_status') is-invalid @enderror" name="acount_status" required autocomplete="new-acount_status">

                                @error('acount_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="balance" class="col-md-4 col-form-label text-md-right">{{ __('balance') }}</label>

                            <div class="col-md-6">
                                <input id="balance" type="balance" class="form-control @error('balance') is-invalid @enderror" name="balance" required autocomplete="new-balance">

                                @error('balance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
