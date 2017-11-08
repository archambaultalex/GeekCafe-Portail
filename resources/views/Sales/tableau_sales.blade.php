@extends('layouts.template')
<?php
use App\Sales;
use Carbon\Carbon;
use App\Item;
use App\ItemPrice;
use App\ItemSize;
use App\Subitem;
?>
@section('title')
    Ventes
@endsection
@section('content')

    Date début
    <input type="date" id="datestart" value="<?php echo Carbon::now()->subMonth(1)->toDateString();?>" style="margin-right: 50px;">
    Date fin
    <input type="date" id="dateend" value="<?php echo Carbon::now()->toDateString();?>" style="margin-right: 20px;">
    <input type="button" value="Filtrer" id="datebtn">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Numero Commande</th>
            <th>Items</th>
            <th>Date Commande</th>
            <th>Prix total</th>
        </tr>
        </thead>
        <tbody>

        <script>
            $('#datebtn').click(function(){
                var dates = [$('#datestart').val(), $('#dateend').val()]

            });
        </script>
        @foreach($sales as $sale)
            <tr>
                @if($sale->is_active == 0)
                    <td>{{$sale->id}}</td>
                    <td>
                        @foreach($sale->saleitems as $saleitem)
                            <?php $itemPrice = ItemPrice::findOrFail($saleitem->item_id);
                            ?>

                            {{ItemSize::findOrFail($itemPrice->size_id)->name}}
                            <?php echo " - "; ?>
                            {{Item::findOrFail($itemPrice->item_id)->name}}
                            <ul>
                                @foreach($saleitem->salesubitem as $subitem)
                                    <li>{{\App\Subitem::findOrFail($subitem->subitem_id)->name}}</li>
                                @endforeach
                            </ul>
                        @endforeach
                    </td>
                    <td>
                        @php
                            if($sale->created_at != null)
                            {
                                echo $sale->created_at;
                            }
                            else
                            {
                            echo "Non specifier";
                            }
                        @endphp
                    </td>
                    <td>
    <?php
    $total = 0;
    ?>
    @foreach($sale->saleitems as $saleitem)
        <?php  $itemPrice = ItemPrice::findOrFail($saleitem->item_id);
        $total = $total + $itemPrice->price;
        ?>
        @foreach($saleitem->salesubitem as $subitem)
            <?php
                $subitem = Subitem::findOrFail($subitem->subitem_id);

            if($subitem->price != null)
                {
                    $total = $total + $subitem->price;
                }
                ?>
            @endforeach
        @endforeach
        <?php echo $total;
        echo "$"?>
                    </td>
                @endif
            </tr>
    @endforeach      </tbody>
    </table>

@endsection