
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/owl.carousel.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/rating.min.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>


        <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    mobex logo
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth
                    <ul class="navbar-nav mr-auto nav_ul">
                        <li class="active"><a href="{{route('home')}}">Home</a></li>
                        {{-- <li><a href="/store/{{Auth::user()->id}}"  class="nav_link_a">Store</a></li> --}}
                        @auth
                        <li><a href="/profile/{{Auth::user()->id}}" class="nav_link_a">Profile</a></li>
                            
                        @endauth
                        <li><a href="./blog.html" class="nav_link_a">IT Support</a></li>
                        <li><a href="{{route('search')}}" class="nav_link_a">search</a></li>
                    </ul>
                    @endauth
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" class="button" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        
                        @else
                            <li class="nav-item dropdown d-flex">
                                <div class="nav_fonts d-flex pt-2">
                                   <div class="font_nav">
                                   
                                       <ul>
                                    <li>
                                        <div class="text-center">
                                            <a href="#" style="padding: 0px;" class="btn" data-toggle="modal" data-target="#largeModal"><i class="fa fa-heart"></i> <span>{{$followers_count}}</span></a>
                                            </div>
                                                <!-- large modal -->
                                                <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">Following Stores</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if ($followers_count != 0)
                                                            

                                                            <table id="basic-data-table" class="table nowrap" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Store Name</th>
                                                                        <th>Owner Name</th>
                                                                        <th>Store bio</th>
                                                                    </tr>
                                                                    </thead>
        
                                                                    <tbody>
                                                                    @foreach ($followers as $follower)
                                                                    <tr>
                                                                        <td>{{$store::find($follower->store_no)->store_name}}</td>
                                                                        <td>{{$follower->user_name}}</td>
                                                                        <td>{{$store::find($follower->store_no)->store_bio}}</td>
                                                                        <td style="padding-top: 0;">
                                                                            <form action="/unfollow/{{$store::find($follower->store_no)->store_name}}" method="POST">
                                                                                @csrf
                                                                                <div class="form-group">
                                                                                <input type="text" hidden class="form-control" name="store_no" id="store_no" value="{{$store::find($follower->store_no)->store_no}}" >
                                                                                <input type="text" hidden class="form-control" name="user_name" id="store_no" value="{{Auth::user()->user_name}}" >
                                                                                </div>
                                                                                <button class="button profile_EditB" style="padding: 0px;" data-text="Open"><span>unfollow</span></button>
                                                                            </form>    
                                                                        </td>
                                                                    </tr>
                                                                        @endforeach 
                                                                    </tbody>
                                                                </table>
                                                            @else
                                                                <h1>No Followed Stores</h1>
                                                            @endif
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>


{{-- ******************************************************************************************************************************************************************************** --}}


                                            <li>
                                    
                                            <div class="text-center">
                                            <a href="#" style="padding: 0px;" class="btn" data-toggle="modal" data-target="#largeModal_order"><i class="fa fa-shopping-bag"></i> <span>{{$order_count}}</span></a>
                                            </div>
                                                <!-- large modal -->
                                                <div class="modal fade" id="largeModal_order" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
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
                                                                        <th>Store Name</th>
                                                                        <th>Price For Unit</th> 
                                                                        <th>Quantity</th>
                                                                        <th>Full Price</th>
                                                                        <th>status</th>
                                                                    </tr>
                                                                    </thead>
        
                                                                    <tbody>
                                                                    @foreach ($order_items as $order_item)
                                                                    <tr>
                                                                        <td>{{$order_item->product_name}}</td>
                                                                        <td>{{$order_item->store_name}}</td>
                                                                        <td>{{$order_item->price / $order_item->quantity}}</td>
                                                                        <td>{{$order_item->quantity}}</td>
                                                                        <td>{{$order_item->product_price * $order_item->quantity}}</td>
                                                                        <td>Waiting</td>
                                                                    </tr>
                                                                        @endforeach 
                                                                    </tbody>
                                                                </table>
                                                
                                                    </div>
                                                    <div class="modal-footer">
                                                    <form action="/move_order_item" method="get" style="margin-top: 61px;margin-left:100px;">  
                                                        <button class="btn btn-primary m-auto" data-text="Open"><span>Move To Cart</span></button>   
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        {{-- _______________________________________________________________________________________________________________________________________________________________________________________________________________________________ --}}
                                        <li>
                                                                           
                                            <div class="text-center">
                                            <a href="#" style="padding: 0px;" class="btn" data-toggle="modal" data-target="#largeModal_myorder"><i class="fa fa-shopping-bag"></i> <span>{{$myorders_count}}</span></a>
                                            </div>
                                                <!-- large modal -->
                                                <div class="modal fade" id="largeModal_myorder" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
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
                                                                        <th>Store Name</th>
                                                                        <th>status</th>
                                                                    </tr>
                                                                    </thead>
        
                                                                    <tbody>
                                                                    @foreach ($myorders as $order_item)
                                                                    <tr>
                                                                        <td>{{$order_item->product_name}}</td>
                                                                        <td>{{$order_item->store_name}}</td>                                                                       
                                                                        <td>Waiting</td>
                                                                    </tr>
                                                                        @endforeach 
                                                                    </tbody>
                                                                </table>
                                                
                                                    </div>
    
                                                </div>
                                            </div>
                                        </li>
                                    </ul>

                                   @endif
                                </div>
                                    @auth
                                    <div class="your_mony">
                                        <p>budget : {{Auth::user()->balance}} $</p>
                                    </div>
                                    @endauth
                                </div>

                                @auth
                                <div class="logout button">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                                @endauth
                            </li>

                    </ul>
                </div>
            </div>
        </nav>
 



        <div class="container">
        <main class="py-4">
            @yield('content')
        </main>
        </div>
    </div>
</body>
</html>
