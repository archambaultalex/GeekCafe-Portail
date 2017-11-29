@extends('layouts.template')

@section('title') Items @endsection
<?php
use App\Image;
use App\ItemType;
?>
@section('content')
    {{--<style>--}}
        {{--/*  SECTIONS  */--}}
        {{--.section {--}}
            {{--clear: both;--}}
            {{--padding: 0px;--}}
            {{--margin: 0px;--}}
        {{--}--}}

        {{--/*  COLUMN SETUP  */--}}
        {{--.col {--}}
            {{--display: block;--}}
            {{--float:left;--}}
            {{--margin: 1% 0 1% 1.6%;--}}
        {{--}--}}
        {{--.col:first-child { margin-left: 0; }--}}

        {{--/*  GROUPING  */--}}
        {{--.group:before,--}}
        {{--.group:after { content:""; display:table; }--}}
        {{--.group:after { clear:both;}--}}
        {{--.group { zoom:1; /* For IE 6/7 */ }--}}
        {{--/*  GRID OF TWO  */--}}
        {{--.span_2_of_2 {--}}
            {{--width: 100%;--}}
        {{--}--}}
        {{--.span_1_of_2 {--}}
            {{--width: 49.2%;--}}
        {{--}--}}

        {{--/*  GO FULL WIDTH AT LESS THAN 480 PIXELS */--}}

        {{--@media only screen and (max-width: 480px) {--}}
            {{--.col {--}}
                {{--margin: 1% 0 1% 0%;--}}
            {{--}--}}
        {{--}--}}

        {{--@media only screen and (max-width: 480px) {--}}
            {{--.span_2_of_2, .span_1_of_2 { width: 100%; }--}}
        {{--}--}}
    {{--</style>--}}

    <div class="table-responsive">
         <a class="btn btn-primary" style="float:right;background-color: #02f837; border-color: #02f837;" href="{{route('items.create')}}">Ajouter un item</a>
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
            </tr>
            </thead>
            <tbody>
            @foreach($items as $row)
                <tr>
                    <td class="v-align-middle ">
                        @if ( base64_encode(base64_decode(Image::findOrFail($row['image_id'])->image, true)) === Image::findOrFail($row['image_id'])->image)
                            <img style="max-width: 40%;" src="data:image/png;base64,{{Image::findOrFail($row['image_id'])->image}}"/>
                        @else
                            <img style="max-width: 40%;" src="{{Image::findOrFail($row['image_id'])->image}}"/>
                        @endif
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

                    <td style="text-align: center" class="v-align-middle">
                        <div class="section group">
                            <div class="col span_1_of_2">
                                <a style="margin-top:15px" class="btn btn-primary" href="{{route('items.edit',$row['id'])}}">Modifier</a>
                            </div>
                            <div class="col span_1_of_2">
                                <form style="margin-top: 15px" method="post" action=" {{route('items.destroy',$row['id'])}}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE"/>
                                    <input style="color: #fff;background-color: #d12a4e;border-color: #ea2c54;" class="btn btn-primary" type="submit" value="Effacer">
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


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
