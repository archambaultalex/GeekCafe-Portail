@extends('layouts.app')
<?php
use Carbon\Carbon;
use App\Item;
use App\ItemPrice;
use App\ItemSize;

?>
@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Numero Commande</th>
                <th>Item</th>
            </tr>
            </thead>
            <tbody>
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
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection