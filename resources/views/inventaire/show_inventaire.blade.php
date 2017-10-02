@extends('layouts.app')

@section('content')
    <?php
            use App\Image;
            use App\ItemType;
            ?>
    <div class="container">
        <table class="table table-striped" id="myTable">
            <thead>
            <tr>
                <th>Image</th>
                <th style="cursor:pointer" onclick="sortTableAlpha()">Item<i class="glyphicon glyphicon-chevron-up"></i></th>
                <th>Description</th>

                <th>Type</th>
                <th>Quantité</th>
                <th style="cursor:pointer" onclick="sortTableDate()">Meilleur avant<i class="glyphicon glyphicon-chevron-up"></i></th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $row)
            <tr>
                <td><img style="max-width: 40%;" src="{{Image::findOrFail($row['image_id'])->image}}"/></td>
                <td class="nameTd">{{$row['name']}}</td>
                <td>{{$row['description']}}</td>
                <td>{{ItemType::findOrFail($row['type_id'])->name}}</td>
                <td>{{$row['quantity']}}</td>
                <td class="dateTd">{{$row['peremption']}}</td>
            </tr>

                @endforeach

            </tbody>
        </table>
    </div>

    <script>
        function sortTableAlpha() {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("myTable");
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
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        //if so, mark as a switch and break the loop:
                        shouldSwitch= true;
                        break;
                    }
                }
                if (shouldSwitch) {
                    /*If a switch has been marked, make the switch
                    and mark that a switch has been done:*/
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        }

        function sortTableDate() {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("myTable");
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
                    x = rows[i].getElementsByClassName("dateTd")[0];
                    y = rows[i + 1].getElementsByClassName("dateTd")[0];
                    //check if the two rows should switch place:
                    //(new Date(startDt).getTime() > new Date(endDt).getTime())
                    if (new Date(x.innerHTML).getTime() < new Date(y.innerHTML).getTime()) {
                        //if so, mark as a switch and break the loop:
                        shouldSwitch= true;
                        break;
                    }
                }
                if (shouldSwitch) {
                    /*If a switch has been marked, make the switch
                    and mark that a switch has been done:*/
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        }
    </script>
@endsection