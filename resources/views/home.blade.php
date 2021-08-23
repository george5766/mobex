@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
           <!-- main Section Begin -->
    <section class="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="main__categories">
                        <div class="main__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            <li><a href="#">IT</a></li>
                            <li><a href="#">kitchen</a></li>
                            <li><a href="#">furneture</a></li>
                            <li><a href="#">clouth</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="main__search">
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
                        @auth
                                                    <div class="main__search__phone">
                            <div class="main__search__phone__icon">
                            @if (Auth::user()->profile_image != null)
                                <img src="{{asset(Auth::user()->profile_image)}}" class="main__search__phone__icon">
                            @else
                                <img src="images/2.jpg" class="main__search__phone__icon">
                            @endif
                            </div>
                            <div class="main__search__phone__text">
                                <h5>{{Auth::user()->user_name}}</h5>
                                <a name="" id="" class="btn btn-sm btn-primary" href="/EditProfile" role="button">Edit profile</a>
                            </div>
                        </div>
                        @endauth
                    </div>
                    <!-- start add-from_likeds slider -->
                    @auth
                        @if (auth::user()->store ==  null)
                        <div  style = "text-align:center;margin-buttom:10px;">
                            <h3 class="">we provide a large market for you just update your profile to store </h3>
                            <button class="button profile_EditB" data-text="Open" ><a href="/make_store/{{Auth::user()->id}}" class="Edit-link"><span>make store</span></a></button>
                        </div>
                        @endif
                    @endauth
                    <div class="section-title" style="margin-top:10px;">
                        <h2>ads</h2>
                    </div>
                    <div class="home-owl owl-carousel owl-theme">
                        @foreach ($latests1 as $product)
                            <div class="item">
                            <div class="featured__item">
                                <div class="featured__item__pic set-bg "  >
                                    <img src="{{$product->product_image}}" style="    width: 100%!important;" alt="" class="featured__item__pic">
                                    
                                    <ul class="featured__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="featured__item__text">
                                    <h6><a href="#">{{$product->product_name}}</a></h6>
                                    <h5>{{$product->product_price}} $</h5>
                                    
                                    <div class="row mb-4">
                                        <div class="col text-center">
                                            <a href="#" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#largeModal{{$product->product_no}}">
                                            more info
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                        @endforeach
                    </div>    
                </div>
            </div>
        </div>
                    <!-- end add slider -->
    </div>
</div>    
<!-- end top page -->

                        @foreach ($latests1 as $product)
                        {{-- product box --}}
                            <!-- large modal -->
                            <div class="modal fade" id="largeModal{{$product->product_no}}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">{{$product->product_name}}</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="featured__item__pic set-bg" >
                                                    <img src="{{$product->product_image}}" alt="" class="featured__item__pic">
                                                    
                                                    <ul class="featured__item__pic__hover">
                                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="featured__item__text">
                                                    <h6><a href="#">{{$product->product_name}}</a></h6>
                                                    <h5>{{$product->product_price}} $</h5>
                                                    @foreach ($rates as $rate)
                                                        @if ($product->product_name == $rate->product_name )
                                                            <h5>{{$rate->rate}} Stars</h5>
                                                            @break
                                                        @endif
                                                    @endforeach

                                                </div>               
                                            </div>
                                            <div class="col-md-6">
                                                <div class="featured__item__pic set-bg" >
                                                    <h3>Store Information </h3>
                                                    <p>Store Name : {{$store::find($product->store_no)->store_name}} </p>
                                                    <p>Store Owner : {{$store::find($product->store_no)->user->user_name}} </p>
                                                    <p>Store Location : {{$store::find($product->store_no)->user->city}} / {{$store::find($product->store_no)->user->city}} </p>
                                                </div>
                                                <div class="featured__item__text">
                                                    <h5><a href="/store/{{$product->store_no}}"  class="btn btn-primary float-left" class="nav_link_a">go to store</a></h5>
                                                    <div class="col-md-3">
                                                
                                                </div>               
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 d-flex" style="padding-left:40px;">

                                                    <form action="/rate/{{$product->product_no}}" method="get">
                                                        @csrf
                                                        <div class="form-group">
                                                            <input type="text" hidden class="form-control" name="product_no" id="store_no" value="{{$product->product_no}}" >
                                                            <input type="text" hidden class="form-control" name="user_name" id="store_no" value="{{Auth::user()->user_name ?? 'guest'}}" >
                                                        </div>                            
                                                        <div class="star-rating">
                                                            <fieldset class="rating star">
                                                                <input type="radio" id="field6_star5" name="rating" value="5" ><label class = "full" for="field6_star5"></label>
                                                                <input type="radio" id="field6_star4" name="rating" value="4" /><label class = "full" for="field6_star4"></label>
                                                                <input type="radio" id="field6_star3" name="rating" value="3" /><label class = "full" for="field6_star3"></label>
                                                                <input type="radio" id="field6_star2" name="rating" value="2" /><label class = "full" for="field6_star2"></label>
                                                                <input type="radio" id="field6_star1" name="rating" value="1" /><label class = "full" for="field6_star1"></label>
                                                            </fieldset>
                                                        </div>
                                                        <button class="btn btn-primary m-auto" data-text="Open"><span>Rate Product</span></button>
                                                    </form>   
                                                        
                                                    <form action="/move_tocart/{{$product->product_no}}" method="get" style="margin-top: 61px;margin-left:100px;">
                                                        @csrf
                                                        <div class="form-group">
                                                            <input type="text" hidden class="form-control" name="product_no" id="store_no" value="{{$product->product_no}}" >
                                                            <input type="text" hidden class="form-control" name="price" id="store_no" value="{{$product->product_price}}" >
                                                            <input type="text" hidden class="form-control" name="user_name" id="store_no" value="{{Auth::user()->user_name ?? 0}}" >
                                                            <div class="form-group">
                                                              <input type="text" class="form-control" style="width:110px;" name="quantity" id="quantity" aria-describedby="helpId" placeholder="Quantity">
                                                            </div>
                                                        </div>                            
                                                        <button class="btn btn-primary m-auto" data-text="Open"><span>Move To Cart</span></button>
                                                    </form>
                                                </div>
                                                <div class="col-md-6">
                                                        
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                        {{-- end product box --}}
                        @endforeach
               
<!-- start sliders -->
<div class="container">
    <!-- start IT slider -->
    <div class="section-title">
        <h2>IT product</h2>
    </div>
    <div class="home-owl owl-carousel owl-theme">
        @foreach ($it_products as $product)
            <div class="item">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" >
                        <img src="{{$product->product_image}}" alt="" class="featured__item__pic">
                        
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">{{$product->product_name}}</a></h6>
                        <h5>{{$product->product_price}} $</h5>
                    </div>
                </div>  
            </div>
        @endforeach
    </div>
    <!-- end it product slider -->




    <!-- start ketchen slider -->
    <div class="section-title">
        <h2>ketchen product</h2>
    </div>
    <div class="home-owl owl-carousel owl-theme">
                @foreach ($ketchen_products as $product)
            <div class="item">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" >
                        <img src="{{$product->product_image}}" alt="" class="featured__item__pic">
                        
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">{{$product->product_name}}</a></h6>
                        <h5>{{$product->product_price}} $</h5>
                    </div>
                </div>  
            </div>
        @endforeach
    </div>
    <!-- end kitchen slider -->
</div>
<!-- end sliders -->

<section class="more_pro">
    <div class="container">
        <div class="section-title">
            <h2>More Product</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="top-rated-slider">
                    <!-- start latest slider -->
                    <div class="section-title">
                        <h2>Latest Product</h2>
                    </div>
                    <div class="owl-carousel owl-theme profile-toprated-carusal" id="profile-toprated-carusal">
                     @foreach ($latests as $latest) 
                        <div class="item">
                            @foreach ($latest as $product) 

                                <div class="featured__item">
                                    <div class="featured__item__pic set-bg" >
                                        <img src="{{asset ($product->product_image)}}" alt="" class="featured__item__pic">
                                        <ul class="featured__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="featured__item__text">
                                        <h6><a href="#">{{$product->product_name}}</a></h6>
                                        <h5>{{$product->product_price}} $</h5>
                                    </div>
                                </div>                                 
                             @endforeach
                        </div>                            
                    @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="top-rated-slider">
                    <!-- start latest slider -->
                    <!-- start latest slider -->
                    <div class="section-title">
                        <h2>Top Rated</h2>
                    </div>
                    <div class="owl-carousel owl-theme profile-toprated-carusal" id="profile-toprated-carusal">
                     @foreach ($latests as $latest) 
                        <div class="item">
                            @foreach ($latest as $product) 

                                <div class="featured__item">
                                    <div class="featured__item__pic set-bg" >
                                        <img src="{{asset ($product->product_image)}}" alt="" class="featured__item__pic">
                                        <ul class="featured__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="featured__item__text">
                                        <h6><a href="#">{{$product->product_name}}</a></h6>
                                        <h5>{{$product->product_price}} $</h5>
                                    </div>
                                </div>                                 
                             @endforeach
                        </div>                            
                    @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="top-rated-slider">
                    <!-- start latest slider -->
                    <div class="section-title">
                        <h2>More Product</h2>
                    </div>
                    <div class="owl-carousel owl-theme profile-toprated-carusal" id="profile-toprated-carusal">
                     @foreach ($latests as $latest) 
                        <div class="item">
                            @foreach ($latest as $product) 

                                <div class="featured__item">
                                    <div class="featured__item__pic set-bg" >
                                        <img src="{{asset ($product->product_image)}}" alt="" class="featured__item__pic">
                                        <ul class="featured__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="featured__item__text">
                                        <h6><a href="#">{{$product->product_name}}</a></h6>
                                        <h5>{{$product->product_price}} $</h5>
                                    </div>
                                </div>                                 
                             @endforeach
                        </div>                            
                    @endforeach
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>
</section>

<section class="from_the_blog">
    <div class="container">
    <div class="row">
        <div class="section-title" style="margin:10px auto 10px auto;">
            <h2>for your help</h2>
        </div>
    </div>
        <div class="row mt-3">
            <div class="col-md-4">
                <div class="item">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg " style="margin-left: 4rem !important;" >
                            <img src="images/1.jpg"  alt="" class="featured__item__pic">
                        </div>
                        <div class="featured__item__text">
                            <h6><h1 >FAQ</h1></h6>
                            <h5>every thing you need</h5>
                        </div>
                    </div>                                 
                </div> 
            </div>
            <div class="col-md-4">
                <div class="item">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" style="margin-left: 4rem !important;">
                            <img src="images/3.jpg" alt="" class="featured__item__pic">
                        </div>
                        <div class="featured__item__text">
                            <h6><h1 >traning</h1></h6>
                            <h5>every thing you need</h5>
                        </div>
                    </div>                                 
                </div>
            </div>
            <div class="col-md-4">
                <div class="item">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" style="margin-left: 4rem !important;">
                            <img src="images/2.jpg" alt="" class="featured__item__pic">
                        </div>
                        <div class="featured__item__text">
                            <h6><h1 >Happy customer</h1></h6>
                            <h5 >every thing about you</h5>
                        </div>
                    </div>                                 
                </div>
            </div>
        </div>    
    </div>
</section>

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            mobex-logo
                        </div>
                        <ul>
                            <li>Address: homs/syria</li>
                            <li>Phone: 0931668791</li>
                            <li>Email: george@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->
</div>
@endsection
