@extends('layouts.template')
@section('title')
    Clients
@endsection

@section('content')
    <?php
    use App\Image;
    use App\ItemType;
    use App\Item;
    ?>

    <div class="container">
        <table class="table table-striped" id="myTable">
            <thead>
            <tr>
                <th>Image</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Courriel</th>
                <th>Genre</th>
                <th>Date de Naissance</th>
                <th>Téléphone</th>
            </tr>
            </thead>
            <tbody>
            @foreach($client as $row)
                <tr>
                    <td class="v-align-middle ">
                        @if ( base64_encode(base64_decode(Image::findOrFail($row['image_id'])->image, true)) === Image::findOrFail($row['image_id'])->image)
                            <img style="max-width: 40%;" src="data:image/png;base64,{{Image::findOrFail($row['image_id'])->image}}"/>
                        @else
                            <img style="max-width: 40%;" src="{{Image::findOrFail($row['image_id'])->image}}"/>
                        @endif
                    </td>
                    <td>{{$row['first_name']}}</td>
                    <td>{{$row['last_name']}}</td>
                    <td>{{$row['email']}}</td>
                    <td>{{$row['gender']}}</td>
                    <td>{{$row['birth_date']}}</td>
                    <td>{{$row['phone']}}</td>
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