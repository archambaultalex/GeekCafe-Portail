<nav id="navBar" class="page-sidebar" data-pages="sidebar">
    <!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->
    <!-- END SIDEBAR MENU TOP TRAY CONTENT-->
    <!-- BEGIN SIDEBAR MENU HEADER-->
    <div class="sidebar-header">
        <a href="{{route('home')}}"><img src="{{asset('img/geek-logo.png')}}" alt="logo" class="brand" data-src="assets/img/geek-logo.png" data-src-retina="assets/img/geek-logo.png" width="150" ></a>
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
                <a style="cursor:pointer" onclick="dropdown_ventes()"><span class="title">Ventes</span></a>
                <span class="icon-thumbnail"><i data-feather="users"></i></span>
                <ul style="height:0px;transition: height; transition-duration: 0.5s;" class="li-menu" id="historiquevente">
                    <li style="padding:5px 0px;"><a href="{{route('ventes')}}"><span class="title">Graphique Historique</span></a>
                    <li style="padding:5px 0px;"><a href="{{route('ventes.tableau')}}"><span class="title">Tableau Historique</span></a>
                </ul>
            </li>

            <li class="">
                <a href="{{route('client.index')}}"><span class="title">Clients</span></a>
                <span class="icon-thumbnail"><i data-feather="users"></i></span>
            </li>

            <li class="">
                <a href="{{route('employes')}}"><span class="title">Employés</span></a>
                <span class="icon-thumbnail"><i data-feather="users"></i></span>
            </li>

            <li class="">
                <a style="cursor:pointer" onclick="dropdown_promotions()"><span class="title">Promotions</span></a>
                <span class="icon-thumbnail"><i data-feather="users"></i></span>
                    <ul style="height:0px;transition: height; transition-duration: 0.5s;" class="li-menu" id="gererpromotions">
                        <li style="padding:5px 0px;"><a href="{{route('promotions.index')}}"><span class="title">Gérer Promotions</span></a>
                        <li style="padding:5px 0px;"><a href="{{route('promotions.live')}}"><span class="title">Promotions live</span></a>
                    </ul>
            </li>

            <li class="">
                <a href="{{route('commandes')}}"><span class="title">Commandes</span></a>
                <span class="icon-thumbnail"><i data-feather="users"></i></span>
            </li>

            <li class="">
                <a href="{{route('subitems.index')}}"><span class="title">SubItems</span></a>
                <span class="icon-thumbnail"><i data-feather="users"></i></span>
            </li>


        </ul>
        <div class="clearfix"></div>
    </div>
    <!-- END SIDEBAR MENU -->
</nav>


<script>
    var droped = false;
    function dropdown_promotions()
    {
        if(!droped)
        {
            document.getElementById('gererpromotions').style.height = "70px";
            droped = true;
        }
        else
        {
            document.getElementById('gererpromotions').style.height = "0px";
            droped = false;
        }

    }
    var droped2 = false;
    function dropdown_ventes()
    {
        if(!droped2)
        {
            document.getElementById('historiquevente').style.height = "70px";
            droped2 = true;
        }
        else
        {
            document.getElementById('historiquevente').style.height = "0px";
            droped2 = false;
        }

    }
</script>

