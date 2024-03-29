@extends('layouts.template')
@section('title')
    Gestion Promotions
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
                <th>Description</th>
                <th>Item associé</th>
                <th>NB/Utilisateurs</th>
                <th>Réduction</th>
                <th>Début</th>
                <th>Fin</th>
            </tr>
            </thead>
            <tbody>
            @foreach($promotion as $row)
                <tr>
                    <td>{{$row['description']}}</td>
                    <?php
                    $item = Item::findOrFail($row['item_id'])
                    ?>
                    <td>{{\App\ItemType::findOrFail($item['type_id'])->name}}
                        {{Item::findOrFail($row['item_id'])->name}}</td>
                    <td>{{$row['available_per_user']}}</td>
                    <td>{{$row['discount']}}</td>
                    <td>{{$row['start_date']}}</td>
                    <td>{{$row['end_date']}}</td>
                    <td><a class="btn btn-primary" href="{{route('promotions.edit',$row['id'])}}">Modifier</a></td>
                    <td>
                        <form method="post" action=" {{route('promotions.destroy',$row['id'])}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE"/>
                            <input style="color: #fff;background-color: #d12a4e;border-color: #ea2c54;" class="btn btn-primary" type="submit" value="Éffacer"></form>
                        </form>
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