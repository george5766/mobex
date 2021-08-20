@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="row">
        <div class="col-lg-3">
            <div class="sidebar">
                <div class="sidebar__item">
                    <div class="info d-flex">
                        <div class="info-div"><h4>Information</h4></div>
                        <div class="edit-button ml-1">
                        <button class="button profile_EditB" data-text="Open"><a href="/EditProfile" class="Edit-link"><span>Edit</span></a></button>
                        </div>
                    </div>
                    <ul class="ul list-unstyled info-ul">
                        <li>User Name : {{Auth::user()->user_name}}</li>
                        <li>Phone Number :{{Auth::user()->phone}}</li>
                        <li>Your Mony :{{Auth::user()->balance}}</li>
                        <li>location :{{Auth::user()->city}} - {{Auth::user()->address }}</li>
                        <li>oders : 
                                    <a href="#" style="padding: 0px;" class="btn" data-toggle="modal" data-target="#my_order_1"> <span>my orders</span></a>
                        <!-- large modal -->
                                                <div class="modal fade" id="my_order_1" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">Your Card</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        
                                                            <table id="basic-data-table" class="table nowrap" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Product Name</th>
                                                                        <th>user Name</th>
                                                                        <th>Quantity</th>
                                                                    </tr>
                                                                    </thead>
        
                                                                    <tbody>
                                                                    @foreach ($order_items as $order_item)
                                                                    <tr>
                                                                        <td>{{$order_item->product_name}}</td>
                                                                        <td>{{$order_item->user_name}}</td>
                                                                        <td>{{$order_item->quantity}}</td>
                                                                    </tr>
                                                                        @endforeach 
                                                                    </tbody>
                                                                </table>
                                                
                                                    </div>
                                                    <div class="modal-footer">
                                                    <form action="/move_order_item" method="get" style="margin-top: 61px;margin-left:100px;">  
                                                        <button class="btn btn-primary m-auto" data-text="Open"><span>closee</span></button>   
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                         </li>
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
    <div class="section-title profile-sales d-flex">
        <h2>Slaes off</h2>
        <div class="edit-button mt-1 ml-2">
            <button class="button add_to_sale" data-text="add"><a href="/new_offer" class="add-link"><span>add</span></a></button>
        </div>
    </div>
    <div class="profile-salesof-owl owl-carousel owl-theme">
        @if ($offers == null)
            <div class="item">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" >
                        <img src="" alt="" class="featured__item__pic">
                    </div>
                    <div class="featured__item__text">
                        <h6>Your Offers Wil Go Here</a></h6>
                    </div>
                </div>  
            </div>
        @else
        @foreach ($offers as $product)
            <div class="item">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg " style="margin-left: 4rem !important;">
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
        @endif
    </div>
        <!--  end sale off slider -->

        <!-- your product section -->

            <div class="section-title profile-your-product d-flex">
                <h2>your product</h2>
                <div class="edit-button mt-1 ml-2">
                    <button class="button add_to_sale" data-text="add"><a href="/add_product" class="add-link"><span>add</span></a></button>
                </div>
            </div>

            <!-- start show product -->
                <div class="container">
                    <div class="row">
                    
                        @foreach ($products as $product)
                        
                            <div class="col-md-4">
                                <div class="item">
                                    <div class="featured__item">
                                        <div class="featured__item__pic set-bg" style="margin-left: 3rem !important;">
                                            <img src="{{asset($product->product_image)}}" alt="" class="featured__item__pic">
                                        </div>
                                        <div class="featured__item__text">
                                            <h6><a href="#">{{$product->product_name}}</a></h6>
                                            <h5>{{$product->product_price - $product->offer}} $</h5>
                                            <button class="button add_to_sale" data-text="add"><a href="/edit_product/{{$product->product_no , $product->store_no}}" class="add-link" action="post"><span>edit</span></a></button>
                                            <button class="button add_to_sale" data-text="add"><a href="/delete_product/{{$product->product_no}}" class="add-link"><span>delete</span></a></button>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            <!--  end show product -->
        <!-- your product section -->
        </div>
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
