@extends('layouts.app')
<?php
use Carbon\Carbon;
use App\Item;
use App\ItemPrice;
?>
@section('content')
    <meta http-equiv="refresh" content="1">
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Numero Commande</th>
                <th>Item</th>
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
                          <?php $itemPriceId = ItemPrice::findOrFail($saleitem->item_id)->item_id; ?>
                              {{Item::findOrFail($itemPriceId)->name}}
                              @foreach($saleitem->salesubitem as $subitem)
                                  <li>{{\App\Subitem::findOrFail($subitem->subitem_id)->name}}</li>
                                   @endforeach

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
    </div>
@endsection