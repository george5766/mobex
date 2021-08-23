@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add product') }}</div>
                <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="/add/{{Auth::user()->store->store_no}}">
                        @csrf
                        <div class="form-group row">
                            <label for="product_name" class="col-md-4 col-form-label text-md-right">{{ __('product_name') }}</label>

                            <div class="col-md-6">
                                <input id="product_name" type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{ old('product_name') }}"   autocomplete="product_name" autofocus>

                                @error('product_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="product_description" class="col-md-4 col-form-label text-md-right">{{ __('product_description') }}</label>

                            <div class="col-md-6">
                                <input id="product_description" type="product_description" class="form-control @error('product_description') is-invalid @enderror" name="product_description"   autocomplete="new-product_description">

                                @error('product_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="offer" class="col-md-4 col-form-label text-md-right">{{ __('offer') }}</label>

                            <div class="col-md-6">
                                <input id="offer" type="offer" class="form-control @error('offer') is-invalid @enderror" name="offer"   autocomplete="new-offer">

                                @error('offer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_price" class="col-md-4 col-form-label text-md-right">{{ __('product_price') }}</label>

                            <div class="col-md-6">
                                <input id="product_price" type="product_price" class="form-control @error('product_price') is-invalid @enderror" name="product_price"   autocomplete="new-product_price">

                                @error('product_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_image" class="col-md-4 col-form-label text-md-right">{{ __('product_image') }}</label>
                            
                            <div class="col-md-6">
                                <input type="file" name="product_image" class="form-control-file" id="product_image">
                                
                                @error('product_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_category" class="col-md-4 col-form-label text-md-right">{{ __('product_category') }}</label>

                            <div class="col-md-6">
                                    <select name="product_category" class="form-select">
                                        <option value="it" selected>it</option>
                                        <option value="phones">phones</option>
                                        <option value="ketchen">kitchen</option>
                                        <option value="furniture">furniture</option>
                                        <option value="clouth">clouth</option>
                                    </select>
                                @error('product_category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit"  class="btn btn-primary">
                                    {{ __('Add product') }}
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
