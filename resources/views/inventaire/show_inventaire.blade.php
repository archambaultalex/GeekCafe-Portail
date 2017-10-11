{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
    {{--<meta http-equiv="content-type" content="text/html;charset=UTF-8" />--}}
    {{--<meta charset="utf-8" />--}}
    {{--<title>Geek Café - Inventaire</title>--}}
    {{--<meta content="" name="description" />--}}
    {{--<meta content="" name="author" />--}}
    <?php
    use App\Image;
    use App\ItemType;
    ?>
    {{--@include('layouts.header')--}}
{{--</head>--}}
{{--<body class="fixed-header menu-pin">--}}

{{--@include('layouts.menu')--}}
{{--@include('layouts.topbar')--}}
{{--<!-- START PAGE-CONTAINER -->--}}
{{--<div class="page-container ">--}}
    {{--<!-- START PAGE CONTENT WRAPPER -->--}}
    {{--<div class="page-content-wrapper ">--}}
        {{--<!-- START PAGE CONTENT -->--}}
        {{--<div class="content ">--}}
            {{--<!-- START CONTAINER FLUID -->--}}
            {{--<div class=" container-fluid   container-fixed-lg bg-white">--}}
                {{--<!-- START card -->--}}
                {{--<div class="card card-transparent">--}}
                    {{--<div class="card-header ">--}}
                        {{--<div class="card-title">Places list--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="card-block">--}}
                        {{--<div class="table-responsive">--}}
                            {{--<table class="table table-hover" id="basicTable">--}}
                                {{--<thead>--}}
                                {{--<tr>--}}
                                    {{--<!-- NOTE * : Inline Style Width For Table Cell is Required as it may differ from user to user--}}
                                                        {{--Comman Practice Followed--}}
                                                        {{---->--}}

                                    {{--<th style="width:20%">Image</th>--}}
                                    {{--<th style="width:20%;cursor:pointer" onclick="sortTableAlpha()">Item</th>--}}
                                    {{--<th style="width:29%">Description</th>--}}
                                    {{--<th style="width:15%">Type</th>--}}
                                    {{--<th style="width:15%">Quantité</th>--}}
                                {{--</tr>--}}
                                {{--</thead>--}}
                                {{--<tbody>--}}
                                {{--@foreach($items as $row)--}}
                                    {{--<tr>--}}
                                        {{--<td class="v-align-middle ">--}}
                                            {{--<img style="max-width: 40%;" src="{{Image::findOrFail($row['image_id'])->image}}"/>--}}
                                        {{--</td>--}}
                                        {{--<td class="v-align-middle nameTd">--}}
                                            {{--<p>{{$row['name']}}</p>--}}
                                        {{--</td>--}}
                                        {{--<td class="v-align-middle">--}}
                                            {{--<p>{{$row['description']}}</p>--}}
                                        {{--</td>--}}
                                        {{--<td class="v-align-middle">--}}
                                            {{--<p>{{ItemType::findOrFail($row['type_id'])->name}}</p>--}}
                                        {{--</td>--}}
                                        {{--<td class="v-align-middle">--}}
                                            {{--<a class="btn btn-primary" href="{{route('promotions.create',$row['id'])}}">Ajouter une Promotion</a>--}}
                                        {{--</td>--}}
                                    {{--</tr>--}}
                                {{--@endforeach--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- END card -->--}}
            {{--</div>--}}
            {{--<!-- END CONTAINER FLUID -->--}}
        {{--</div>--}}
        {{--<!-- END PAGE CONTENT -->--}}
        {{--<!-- START COPYRIGHT -->--}}
        {{--<!-- START CONTAINER FLUID -->--}}
        {{--<!-- START CONTAINER FLUID -->--}}
    {{--@include('layouts.footer')--}}
    {{--<!-- END COPYRIGHT -->--}}
    {{--</div>--}}
    {{--<!-- END PAGE CONTENT WRAPPER -->--}}
{{--</div>--}}
{{--<!-- END PAGE CONTAINER -->--}}


{{--<!-- END OVERLAY -->--}}
{{--<!-- BEGIN VENDOR JS -->--}}
{{--<!--    --><?php //include('includes/footer-files.php') ?>--}}
{{--<!-- END PAGE LEVEL JS -->--}}
{{--<script>--}}


    {{--var sorted = false;--}}
    {{--function sortTableAlpha() {--}}

        {{--var table, rows, switching, i, x, y, shouldSwitch, sortIcon;--}}
        {{--sortIcon = document.getElementById("sortIcon");--}}
        {{--table = document.getElementById("basicTable");--}}
        {{--switching = true;--}}
        {{--/*Make a loop that will continue until--}}
        {{--no switching has been done:*/--}}
        {{--while (switching) {--}}
            {{--//start by saying: no switching is done:--}}
            {{--switching = false;--}}
            {{--rows = table.getElementsByTagName("TR");--}}
            {{--/*Loop through all table rows (except the--}}
            {{--first, which contains table headers):*/--}}
            {{--for (i = 1; i < (rows.length - 1); i++) {--}}
                {{--//start by saying there should be no switching:--}}
                {{--shouldSwitch = false;--}}
                {{--/*Get the two elements you want to compare,--}}
                {{--one from current row and one from the next:*/--}}
                {{--x = rows[i].getElementsByClassName("nameTd")[0];--}}
                {{--y = rows[i + 1].getElementsByClassName("nameTd")[0];--}}
                {{--//check if the two rows should switch place:--}}
                {{--if(sorted) {--}}
                    {{--if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {--}}
                        {{--//if so, mark as a switch and break the loop:--}}
                        {{--shouldSwitch = true;--}}
                        {{--break;--}}
                    {{--}--}}
                {{--}--}}
                {{--else {--}}
                    {{--if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {--}}
                        {{--//if so, mark as a switch and break the loop:--}}
                        {{--shouldSwitch = true;--}}
                        {{--break;--}}
                    {{--}--}}
                {{--}--}}
            {{--}--}}
            {{--if (shouldSwitch) {--}}
                {{--/*If a switch has been marked, make the switch--}}
                {{--and mark that a switch has been done:*/--}}
                {{--rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);--}}
                {{--switching = true;--}}
            {{--}--}}
        {{--}--}}
        {{--sorted = !sorted;--}}

    {{--}--}}
{{--</script>--}}



{{--</body>--}}


{{--</html>--}}

@extends('layouts.template')

@section('title') Acceuil @endsection

@section('content')

    <div class="table-responsive">
        <table class="table table-hover" id="basicTable">
            <thead>
            <tr>
                <!-- NOTE * : Inline Style Width For Table Cell is Required as it may differ from user to user
                Comman Practice Followed
                -->

                <th style="width:20%">Image</th>
                <th style="width:20%;cursor:pointer" onclick="sortTableAlpha()">Item</th>
                <th style="width:29%">Description</th>
                <th style="width:15%">Type</th>
                <th style="width:15%">Quantité</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $row)
                <tr>
                    <td class="v-align-middle ">
                        <img style="max-width: 40%;" src="{{Image::findOrFail($row['image_id'])->image}}"/>
                    </td>

                    <td class="v-align-middle nameTd">
                        <p>{{$row['name']}}</p>
                    </td>

                    <td class="v-align-middle">
                        <p>{{$row['description']}}</p>
                    </td>

                    <td class="v-align-middle">
                        <p>{{ItemType::findOrFail($row['type_id'])->name}}</p>
                    </td>

                    <td class="v-align-middle">
                        <a class="btn btn-primary" href="{{route('promotions.create',$row['id'])}}">Ajouter une Promotion</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <script>


            var sorted = false;
            function sortTableAlpha() {

                var table, rows, switching, i, x, y, shouldSwitch, sortIcon;
                sortIcon = document.getElementById("sortIcon");
                table = document.getElementById("basicTable");
                switching = true;
                /*Make a loop that will continue until
                no switching has been done:*/
                while (switching) {
                    //start by saying: no switching is done:
                    switching = false;
                    rows = table.getElementsByTagName("TR");
                    /*Loop through all table rows (except the
                    first, which contains table headers):*/
                    for (i = 1; i < (rows.length - 1); i++) {
                        //start by saying there should be no switching:
                        shouldSwitch = false;
                        /*Get the two elements you want to compare,
                        one from current row and one from the next:*/
                        x = rows[i].getElementsByClassName("nameTd")[0];
                        y = rows[i + 1].getElementsByClassName("nameTd")[0];
                        //check if the two rows should switch place:
                        if(sorted) {
                            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                                //if so, mark as a switch and break the loop:
                                shouldSwitch = true;
                                break;
                            }
                        }
                        else {
                            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                                //if so, mark as a switch and break the loop:
                                shouldSwitch = true;
                                break;
                            }
                        }
                    }
                    if (shouldSwitch) {
                        /*If a switch has been marked, make the switch
                        and mark that a switch has been done:*/
                        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                        switching = true;
                    }
                }
                sorted = !sorted;

            }
        </script>

@endsection
