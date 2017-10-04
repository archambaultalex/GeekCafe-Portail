@extends('layouts.app')

@section('content')
    <?php
            use App\Image;
            use App\ItemType;
            ?>
    <div class="container">
        <h1>Inventaire</h1>
        <table class="table table-striped" id="myTable">
            <thead>
            <tr>
                <th>Image</th>
                <th style="cursor:pointer" onclick="sortTableAlpha()">Item<i id="sortIcon" class="glyphicon glyphicon-chevron-up"></i></th>
                <th>Description</th>
                <th>Type</th>
                <th>Quantité</th>
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
                <td>
                    <a class="btn btn-primary" href="{{route('promotions.create',$row['id'])}}">Ajouter une Promotion</a>
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
            if(!sorted)
                $("#sortIcon").attr("class", "glyphicon glyphicon-sort-by-alphabet-alt");
            else
                $("#sortIcon").attr("class", "glyphicon glyphicon-sort-by-alphabet");
//        <i class="glyphicon glyphicon-menu-down"></i>
            sorted = !sorted;

        }
    </script>
@endsection