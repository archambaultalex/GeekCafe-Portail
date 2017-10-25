@include('layouts.header')
<head> <meta http-equiv="refresh" content="5"></head>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Numero Commande</th>
        <th>Items</th>
        <th>Temps depuis commandé</th>
    </tr>
    </thead>
    <tbody><?php
    use Carbon\Carbon;
    use App\Item;
    use App\ItemPrice;
    use App\ItemSize;
    use App\ItemType;
    ?>
    @foreach($sales as $sale)
        <tr>
            @if($sale->is_active == 1)
                <td>{{$sale->id}}</td>
                <td>
                    @foreach($sale->saleitems as $saleitem)
                        <?php $itemPrice = ItemPrice::findOrFail($saleitem->item_id);
                        ?>

                        {{ItemSize::findOrFail($itemPrice->size_id)->name}}
                        <?php echo " - "; ?>
                            <?php
                            $item = Item::findOrFail($itemPrice['item_id'])
                            ?>
                        {{\App\ItemType::findOrFail($item->type_id)->name}}
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
                             echo $sale->created_at->diffForHumans(Carbon::now(),true);
                              echo " ago";
                         }
                         else
                         {
                         echo "Non specifier";
                         }
                    @endphp
                </td>
            @endif
        </tr>
    @endforeach

    </tbody>
</table>