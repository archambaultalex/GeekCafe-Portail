@extends('layouts.template')
<?php
use Carbon\Carbon;
use App\Item;
use App\ItemPrice;
use App\ItemSize;
?>

@section('title')
    Commandes
    @endsection
@section('content')
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Numero Commande</th>
                <th>Items</th>
                <th>Temps depuis commandé</th>
            </tr>
            </thead>
            <tbody>
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
@endsection
