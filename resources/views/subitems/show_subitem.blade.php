@extends('layouts.template')

@section('title') SubItem @endsection
<?php
use App\Image;
use App\Item;use App\ItemType;

?>

<style>
    .modal-backdrop.fade
    {
        opacity: 0.6 !important;
    }

    .modal .modal-content
    {
        margin-top:250px;
    }
</style>

@section('content')

    <div class="table-responsive">
         <a class="btn btn-primary" style="float:right;background-color: #02f837; border-color: #02f837;" href="{{route('subitems.create')}}">Ajouter un subitem</a>
        <table class="table table-hover" id="basicTable">
            <thead>
            <tr>
                <!-- NOTE * : Inline Style Width For Table Cell is Required as it may differ from user to user
                Comman Practice Followed
                -->

                <th style="width:20%">Image</th>
                <th style="width:20%;cursor:pointer" onclick="sortTableAlpha()">Nom</th>
                <th style="width:29%">Prix</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $row)
                <tr>
                    <td class="v-align-middle ">
                        <img style="max-width: 40%;" src="data:image/png;base64,{{App\Image::findOrFail($row['image_id'])->image}}"/>
                    </td>

                    <td class="v-align-middle nameTd">
                        <p>{{$row['name']}}</p>
                    </td>

                    <td class="v-align-middle">
                        <p>{{$row['price']}}</p>
                    </td>

                    <td style="text-align: center" class="v-align-middle">
                        <a class="btn btn-primary" href="{{route('subitems.edit',$row['id'])}}">Modifier</a>

                        <button onclick="addData({{$row['id']}})" type="button" class="btn btn-primary subAdd" id="{{$row['id']}}" data-toggle="modal" data-target="#myModal">Ajouter a un item</button>
                        {{--<form style="margin-top: 15px" method="post" action=" {{route('subitems.destroy',$row['id'])}}">--}}
                            {{--{{ csrf_field() }}--}}
                            {{--<input type="hidden" name="_method" value="DELETE"/>--}}
                            {{--<input style="color: #fff;background-color: #d12a4e;border-color: #ea2c54;" class="btn btn-primary" type="submit" value="Éffacer">--}}
                        {{--</form>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Choisir l'item</h4>
                </div>
                <form action="{{route('additem')}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">

                            <input id="hiddenval" type="hidden" name="otherid" value="">

                            <select name="itemselect">
                                <?php
                                $itemTypes = Item::all();
                                foreach ($itemTypes as $row)
                                {
                                    echo "<option name=\"".$row->id."\" value=\"".$row->id."\">" . $row->name . "</option>";
                                }
                                ?>
                            </select>




                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Ajouter"/>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>

                    </div>
                </form>

            </div>

        </div>

    </div>


        <script>

            var temp = "#hiddenval";

            function addData(data)
            {
//                var myBookId = $(this).data('id');
                $(temp).val( data );
            }


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
