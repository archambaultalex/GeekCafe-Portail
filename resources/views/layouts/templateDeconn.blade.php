<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Geek Café - Inventaire</title>
    <meta content="" name="description" />
    <meta content="" name="author" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <?php
    use App\Image;
    use App\ItemType;
    ?>
    @include('layouts.header')
</head>
<body id="body" class="fixed-header menu-pin">
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header" style="float: left;">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a style="color:#00bc0e !important;" class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->

                <!-- Right Side Of Navbar Test -->
                <ul class="nav navbar-nav navbar-right" style="display: inline!important;">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li style="float:right"><a href="{{ route('login') }}">Login</a></li>
                        <li style="float:right"><a href="{{ route('register') }}">Register</a></li>
                    @else

                        <li>
                            <a href="{{ route('home') }}" class="" >
                                Dashboard
                            </a>
                        </li>

                        <li class="dropdown">
                            {{--<img style="float:left; max-width:15%;vertical-align: top" src="data:image/png;base64,{{Auth::user()->image->image}}"/>--}}
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->first_name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">

                                <li>
                                    <a href="{{ route('profile.edit',Auth::user()->id) }}">
                                        Profile
                                    </a>

                                </li>

                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>


                            </ul>
                        </li>

                    @endif
                </ul>

            </div>
        </div>
    </nav>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<!-- START PAGE-CONTAINER -->
<div class="page-container ">
    <!-- START PAGE CONTENT WRAPPER -->
    <div class="page-content-wrapper ">
        <!-- START PAGE CONTENT -->
        <div class="content " style="max-width:1200px; padding:0px !important; margin:0 auto">
            <!-- START CONTAINER FLUID -->
            <div class=" container-fluid   container-fixed-lg bg-white">
                <!-- START card -->
                <div class="card card-transparent">
                    <div class="card-header ">
                        <div class="card-title">Inscription</div>
                    </div>
                    <div class="card-block">
                        <div id="test" style="min-height:500px" class="table-responsive">
                            @yield('content')
                        </div>
                    </div>
                </div>
                <!-- END card -->
            </div>
            <!-- END CONTAINER FLUID -->
        </div>
        <!-- END PAGE CONTENT -->
        <!-- START COPYRIGHT -->
        <!-- START CONTAINER FLUID -->
        <!-- START CONTAINER FLUID -->

    <!-- END COPYRIGHT -->

    </div>
@include('layouts.footer')

    <!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTAINER -->


<!-- END OVERLAY -->
<!-- BEGIN VENDOR JS -->
<!--    --><?php //include('includes/footer-files.php') ?>

<!-- END PAGE LEVEL JS -->

</body>



</html>
