@extends('layouts.app')

@section('content')
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
                @if($sale->is_active == 1)
                 <tr>
                    <td>{{$sale->id}}</td>
                    <td>
                        @foreach($saleitems as $saleitem)
                            @if($saleitem->sale_id == $sale->id)
                                    @foreach($items as $item)
                                        <p>
                                        @if($item->id == $saleitem->id)
                                                @foreach($itemtypes as $itemtype)
                                                    @if($itemtype->id == $item->type_id)
                                                        {{$itemtype->name}}
                                                    @endif
                                                @endforeach
                                                {{$item->name}}
                                        </p>
                                    @endif
                                @endforeach
                                <ul>
                                    @foreach($salesubitems as $salesubitem)
                                        @if($salesubitem->sale_id == $saleitem->sale_id && $salesubitem->sale_item_id == $saleitem->id)
                                            @foreach($subitems as $subitem)
                                                @if($subitem->id == $salesubitem->subitem_id)
                                                    <li>
                                                        {{$subitem->name}}
                                                    </li>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                        @endforeach
                    </td>
                    <td>{{$sale->is_active}}</td>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endsection