@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('add offer') }}</div>

                <div class="card-body">
                    <div class="row">
                        @foreach (Auth::user()->store->product as $product)
                            <div class="item col-md-6">
                            <div class="featured__item">
                                <div class="featured__item__pic set-bg profile_image "style="margin-left: 6rem !important;" >
                                    <img src="{{$product->product_image}}" alt="" class="featured__item__pic">
                                </div>
                                <div class="featured__item__text">
                                    <h6><a href="#">{{$product->product_name}}</a></h6>
                                    <h5>{{$product->product_price}} $</h5>
                                
                                    @if ($product->offer == 0)
                                    <a name="" id="" class="btn btn-primary" href="/add_offer/{{$product->product_no}}" role="button">add offer</a>                                        
                                    @else
                                    <a name="" id="" class="btn btn-primary" href="/add_offer/{{$product->product_no}}" role="button">edit offer</a>  
                                    <a name="" id="" class="btn btn-primary" href="/delete_offer/{{$product->product_no}}" role="button">delete offer</a>     
                                    @endif
                                </div>
                            </div>  
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
