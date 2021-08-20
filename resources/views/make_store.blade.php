@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('make store') }}</div>

                <div class="card-body">
                    <form method="GET" action="/create_store/{{Auth::user()->id}}">
                        @csrf

                        <div class="form-group row">
                            <label for="store_name" class="col-md-4 col-form-label text-md-right">{{ __('store name') }}</label>

                            <div class="col-md-6">
                                <input id="store_name" type="store_name" class="form-control @error('store_name') is-invalid @enderror" name="store_name" value="{{ old('store_name') }}" required authintication>

                                @error('store_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="store_bio" class="col-md-4 col-form-label text-md-right">{{ __('store bio') }}</label>

                            <div class="col-md-6">
                                <input id="store_bio" type="text" class="form-control @error('store_bio') is-invalid @enderror" name="store_bio" required autocomplete="current-store_bio">

                                @error('store_bio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-0 row">
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('upgrade') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
