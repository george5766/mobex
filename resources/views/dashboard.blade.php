
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


<div class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top mb-4">
    <div calss="container">
        <div class="row">
            <div class="col-md-12 t-center" style="margin-left: 430px;">
                Mobex DASHBOARD
            </div>    
        </div>
    </div>
    <div class="logout button" style="margin-left: 420px;">
        <a class="dropdown-item" style="text-align: center;" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>

{{-- start dash body --}}

<div class="container">
    <div class="row">
        <div class="justify-content-center col-md-12">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    {{ __('Users') }}
                         <form method="POST" action="{{ route('regist') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-primary float-right ">Add New User</button>
                        </form>
                    </div>

                    <div class="card-body">

                            <div class="row">
                                <div class="bg-white shadow-sm navbar mb-2"style="width:100%">
                                    <div class="col-md-12">
                                        <table id="basic-data-table" class="table nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>user name</th>
                                                    <th>city</th>
                                                    <th>address</th>
                                                    <th>gender</th>
                                                    <th>phone</th>
                                                    <th>account status</th>
                                                    <th>balance</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                @foreach ($users as $user)
                                                <tr>
                                                    <td>{{$user->user_name}}</td>
                                                    <td>{{$user->city}}</td>
                                                    <td>{{$user->address}}</td>
                                                    <td>{{$user->sex}}</td>
                                                    <td>{{$user->phone}}</td>
                                                    <td>{{$user->account_status}}</td>
                                                    <td>{{$user->balance}}</td>
                                                    <td><a class="nav-link btn btn-danger d-inline float-right" href="/delete/{{$user->id}}">{{ __('Delete') }}</a></td>
                                                    @if ($user->account_status != 'suspended' )
                                                        <td><a class="nav-link btn btn-info d-inline float-right" href="/suspend/{{$user->id}}">{{ __('Suspend') }}</a></td>                                                    
                                                    @else
                                                        <td><a class="nav-link btn btn-info d-inline float-right" href="/unsuspend/{{$user->id}}">{{ __('unSuspend') }}</a></td>                                                    
                                                    @endif
                                                    <td>
                                                        <form action="/add_mony/{{$user->id}}" method="get">
                                                            @csrf
                                                            <div class="d-flex">
                                                                <div class="form-group ">
                                                                <input type="text" class="form-control" name="mony" id="mony" style="width:70px; margin-right:5px;height:40px;">
                                                                </div>
                                                                <button class="nav-link btn btn-success d-inline float-right" data-text="Open" style="height:40px;"><span>add</span></button>
                                                            </div>
                                                        </form>                                            
                                                    </td>
                                                </tr>
                                                    @endforeach 
                                                </tbody>
                                            </table>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- end dash body --}}


</body>
</html>
    