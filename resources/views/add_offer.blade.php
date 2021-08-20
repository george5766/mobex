@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('add offer') }}</div>

                <div class="card-body">
                <form method="GET" action="/up_offer/{{$product_no}}">
                        @csrf
                        <div class="form-group row">
                            <label for="offer" class="col-md-4 col-form-label text-md-right">{{ __('offer') }}</label>

                            <div class="col-md-6">
                                <input id="offer" type="text" class="form-control @error('offer') is-invalid @enderror" name="offer" value="{{ old('offer') }}"   autocomplete="offer" autofocus>

                                @error('offer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type=""  class="btn btn-primary">
                                    {{ __('add new offer') }}
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
