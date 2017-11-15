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
    <form class="form-horizontal" method="POST" action="{{ route('ventes.filtrer') }}">
        {{ csrf_field() }}
        <input type="date" id="datestart" name="datestart" value="<?php if(isset($datestart)){echo $datestart;}else{echo Carbon::now()->subMonth(1)->toDateString();} ?>" style="margin-right: 50px;" required autofocus>
        Date fin
        <input type="date" id="dateend" name="dateend" value="<?php if(isset($dateend)){echo $dateend;}else{echo Carbon::now()->toDateString();} ?>" style="margin-right: 20px;" required autofocus>
        <button type="submit" class="btn btn-primary" id="datebtn">
            Filtrer
        </button>
    </form>
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
        <?php
        echo number_format($total,2);

        echo "$"?>
                    </td>
                @endif
            </tr>
    @endforeach      </tbody>
    </table>

@endsection