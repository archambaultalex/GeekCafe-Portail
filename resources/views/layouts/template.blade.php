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

@include('layouts.menu')
@include('layouts.topbar')
<!-- START PAGE-CONTAINER -->
<div class="page-container ">
    <!-- START PAGE CONTENT WRAPPER -->
    <div class="page-content-wrapper ">
        <!-- START PAGE CONTENT -->
        <div class="content ">
            <!-- START CONTAINER FLUID -->
            <div class=" container-fluid   container-fixed-lg bg-white">
                <!-- START card -->
                <div class="card card-transparent">
                    <div class="card-header ">
                        <div class="card-title">@yield('title')</div>
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
        @include('layouts.footer')
    </div>

    <!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTAINER -->


<!-- END OVERLAY -->
<!-- BEGIN VENDOR JS -->
<!--    --><?php //include('includes/footer-files.php') ?>

<!-- END PAGE LEVEL JS -->

</body>



</html>
