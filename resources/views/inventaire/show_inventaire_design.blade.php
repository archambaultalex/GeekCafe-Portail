<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Geek Café - Liste des restaurants</title>
    <meta content="" name="description" />
    <meta content="" name="author" />
    @include('layouts.header')
</head>
<body class="fixed-header menu-pin">

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
                        <div class="card-title">Places list
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table table-hover" id="basicTable">
                                <thead>
                                <tr>
                                    <!-- NOTE * : Inline Style Width For Table Cell is Required as it may differ from user to user
                                                        Comman Practice Followed
                                                        -->
                                    <th style="width:20%">City</th>
                                    <th style="width:20%">Country</th>
                                    <th style="width:29%">Street</th>
                                    <th style="width:15%">Status</th>
                                    <th style="width:15%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($item as $row)
                                <tr>
                                    <td class="v-align-middle ">
                                        <p>Boisbriand</p>
                                    </td>
                                    <td class="v-align-middle">
                                        <p>Canada</p>
                                    </td>
                                    <td class="v-align-middle">
                                        <p>453 Boul du Faubourg</p>
                                    </td>
                                    <td class="v-align-middle">
                                        <p>Active</p>
                                    </td>
                                    <td class="v-align-middle">
                                        <a href="placeslist-profile-menu.php">See more detail</a>
                                    </td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
    @include('layouts.footer')
    <!-- END COPYRIGHT -->
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