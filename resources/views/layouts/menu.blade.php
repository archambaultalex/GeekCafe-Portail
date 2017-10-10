<nav class="page-sidebar" data-pages="sidebar">
    <!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->
    <!-- END SIDEBAR MENU TOP TRAY CONTENT-->
    <!-- BEGIN SIDEBAR MENU HEADER-->
    <div class="sidebar-header">
        <img src="{{asset('img/geek-logo.png')}}" alt="logo" class="brand" data-src="assets/img/geek-logo.png" data-src-retina="assets/img/geek-logo.png" width="150" >
    </div>
    <!-- END SIDEBAR MENU HEADER-->
    <!-- START SIDEBAR MENU -->
    <div class="sidebar-menu">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items">

            <li class="">
                <a href="{{route('inventaire')}}"><span class="title">Inventaire</span></a>
                <span class="icon-thumbnail"><i data-feather="users"></i></span>
            </li>

            <li class="">
                <a href="{{route('ventes')}}"><span class="title">Ventes</span></a>
                <span class="icon-thumbnail"><i data-feather="users"></i></span>
            </li>

            <li class="">
                <a href="{{route('inventaire')}}"><span class="title">Clients</span></a>
                <span class="icon-thumbnail"><i data-feather="users"></i></span>
            </li>

            <li class="">
                <a href="{{route('inventaire')}}"><span class="title">Employés</span></a>
                <span class="icon-thumbnail"><i data-feather="users"></i></span>
            </li>

            <li class="">
                <a href="{{route('promotions.index')}}"><span class="title">Promotions</span></a>
                <span class="icon-thumbnail"><i data-feather="users"></i></span>
            </li>

            <li class="">
                <a href="{{route('commandes')}}"><span class="title">Commandes</span></a>
                <span class="icon-thumbnail"><i data-feather="users"></i></span>
            </li>


        </ul>
        <div class="clearfix"></div>
    </div>
    <!-- END SIDEBAR MENU -->
</nav>
