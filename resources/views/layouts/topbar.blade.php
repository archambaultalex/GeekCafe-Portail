<div class="header ">
    <?php
use App\User;
        ?>
    <!-- START MOBILE SIDEBAR TOGGLE -->
    <a onclick="sidbarOpen()"  class="btn-link toggle-sidebar hidden-lg-up pg pg-menu" data-toggle="sidebar">
    </a>
    <!-- END MOBILE SIDEBAR TOGGLE -->
    <div class="">
        <div class="brand inline">
            <!-- DON'T ERASE THE BRAND INLINE DIV -->
        </div>
    </div>
    <div id="profile" class="d-flex align-items-center">
        <!-- START User Info-->
        <div class="pull-left p-r-10 fs-14 font-heading hidden-md-down m-l-20">
            <span  class="semi-bold">{{User::findOrFail(Auth::id())->first_name}}</span> <span class="text-master">{{User::findOrFail(Auth::id())->last_name}}</span>
        </div>

        <div style="cursor:pointer" class="dropdown pull-right hidden-md-down">
            <button style="cursor:pointer" class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span style="cursor:pointer" class="thumbnail-wrapper d32 circular inline" onclick="dropdown()">
              <img style="cursor:pointer" src="data:image/png;base64,{{User::findOrFail(Auth::id())->image->image}}" alt="" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar_small2x.jpg" width="32" height="32">
              </span>
            </button>
            <div id="dropDiv" style="padding: 5px 0px; display:none" class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
                <a href="{{ route('profile.edit',Auth::user()->id) }}" style="padding: 0 20px !important" class="dropdown-item">
                    <span class="pull-left">Profile</span>
                </a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item" style="padding: 0 20px !important">
                    <span class="pull-left">Sign out</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
        <!-- END User Info-->
    </div>
</div>

<style>
    .dropped{
        display:block !important;
    }


</style>

<script>
    var dropped = false;
    function dropdown()
    {
        var x = document.getElementById("dropDiv");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

</script>


<script>
    var sideparOp = false;
    function sidbarOpen()
    {
        var x = document.getElementById('body');
        var y = document.getElementById('navBar');
        if(!sideparOp)
        {
            x.className="fixed-header menu-pin sidebar-open";
            y.className="page-sidebar visible";
            sideparOp = true;
        }
        else
        {
            x.className="fixed-header menu-pin";
            y.className="page-sidebar";
            sideparOp = false;
        }
    }

</script>

