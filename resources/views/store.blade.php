@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-lg-3">
            <div class="sidebar">
                <div class="sidebar__item">
                    <div class="info d-flex">
                        <div class="info-div"><h4>Information</h4></div>
                            @if($id != Auth::user()->id)
                                <div class="edit-button ml-1">
                                @if ($follow != null)
                                <form action="/unfollow/{{$id}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                      <input type="text" hidden class="form-control" name="store_no" id="store_no" value="{{$id}}" >
                                      <input type="text" hidden class="form-control" name="user_name" id="store_no" value="{{Auth::user()->user_name}}" >
                                    </div>
                                    <button class="button profile_EditB" data-text="Open"><span>unfollow</span></button>
                                </form>    
                                @else
                                <form action="/follow/{{$id}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                      <input type="text" hidden class="form-control" name="store_no" id="store_no" value="{{$id}}" >
                                      <input type="text" hidden class="form-control" name="user_name" id="store_no" value="{{Auth::user()->user_name}}" >
                                    </div>
                                    <button class="button profile_EditB" data-text="Open"><span>follow</span></button>
                                </form> 
                                @endif
                                </div>
                            @endif
                        </div>
                    <ul class="ul list-unstyled info-ul">
                        <li><p class="d-inline">store rank : </p>{{$store->store_no}}</li>
                        <li><p class="d-inline">store name : </p>{{$store->store_name}}</li>
                        <li><p class="d-inline">owner name : </p>{{$store->user->user_name}}</li>
                        <li><p class="d-inline">location : </p>{{$store->user->city}} / {{$store->user->address }}</li>
                    </ul>
                </div>
            </div>
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
                                        <img src="{{asset($product->product_image)}}" alt="" class="featured__item__pic">
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
                <!-- end latest product slider -->
            </div>

            <div class="top-rated-slider">
                <!-- start top rated slider -->
                <div class="section-title">
                    <h2>Top Rated</h2>
                </div>
                <div class="owl-carousel owl-theme profile-toprated-carusal" id="profile-toprated-carusal">
                    @foreach ($latests as $latest) 
                        <div class="item">
                            @foreach ($latest as $product) 
                                <div class="featured__item">
                                    <div class="featured__item__pic set-bg" >
                                        <img src="{{asset($product->product_image)}}" alt="" class="featured__item__pic">
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
                <!-- end top rated product slider -->
            </div>
        </div>
        <div class="col-lg-9">
        
        <!-- end sale of slider -->
        
         <!-- start sales of slider -->
    <div class="section-title store-sales profile-sales d-flex">
        <h2>Slaes off</h2>

    </div>
    <div class="profile-salesof-owl owl-carousel owl-theme">
        @foreach ($offers as $product)
            <div class="item">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" >
                        <img src="{{asset($product->product_image)}}" alt="" class="featured__item__pic">
                        
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">{{$product->product_name}}</a></h6>
                        <h5>{{$product->product_price - $product->offer}} $</h5>
                    </div>
                </div>  
            </div>
        @endforeach
    </div>
        <!--  end sale off slider -->

        <!-- your product section -->

            <div class="section-title store-your-product profile-your-product d-flex">
                <h2>your product</h2>

            </div>

            <!-- start show product -->
                <div class="container">
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-md-4">
                                <div class="item">
                                    <div class="featured__item">
                                        <div class="featured__item__pic set-bg" >
                                            <img src="{{asset($product->product_image)}}" alt="" class="featured__item__pic">
                                            </div>
                                            <div class="featured__item__text">
                                                <h6><a href="#">{{$product->product_name}}</a></h6>
                                                <h5>{{$product->product_price}} $</h5>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            @endforeach
                            </div>
                    </div>
                </div>
            <!--  end show product -->
        <!-- your product section -->
        </div>
    </div>
</div>

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
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello@colorlib.com</li>
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

@endsection
