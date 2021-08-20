@extends('layouts.app')

@section('content')
        <!-- main Section Begin -->
        <section class="main">
            <div class="container">
                <div class="row">
                        <div class="main__search m-auto mb-4" style="overflow: unset;">
                            <div class="main__search__form">
                                <form action="/search_result" method="get">
                                 @csrf
                                    <div class="main__search__categories" style="padding:0px;">
                                        <div class="dropup">    
                                            <select name="By" class="form-select" style="    width: 100%;
                                                                                    margin: 0px;
                                                                                    height: 48px;
                                                                                    text-align: center;
                                                                                    padding-left: 55px;
                                                                                    border: yellow;" aria-label="Search By">
                                                <option value="name" selected>name</option>
                                                <option value="category">category</option>
                                                <option value="price">price</option>
                                            </select>
                                        </div>
                                        <span class="arrow_carrot-down"></span>
                                    </div>
                                    <input id="search" type="text" placeholder="what ever you need !.." class="form-control @error('search') is-invalid @enderror" name="search" value="{{ old('search') }}"   autocomplete="search" autofocus>                                    
                                    <button type="submit" class="site-btn">SEARCH</button>
                                </form>
                            </div>
                        </div>

                    </div>
    <!-- Product Section Begin -->
    <section class="product spad mt-4">
        <div class="container">
            <div class="row">
                @if ($results != null)
                @foreach ($results as $product)
                    <div class="col-md-4">
                        <div class="item">
                            <div class="featured__item">
                                <div class="featured__item__pic set-bg" >
                                    <img src="{{asset($product->product_image)}}" alt="" class="featured__item__pic">
                                    </div>
                                    <div class="featured__item__text">
                                        <h6><a href="#">{{$product->product_name}}</a></h6>
                                        <h5>{{$product->product_price - $product->offer}} $</h5>

                                    </div>
                                </div>  
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- Product Section End -->
</div>

</div>


</div>
</div>



@endsection
