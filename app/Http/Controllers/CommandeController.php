<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;
use App\SaleItem;
use App\SaleSubitem;
use App\Item;
use App\ItemSubItem;
use App\ItemSize;
use App\ItemType;
use App\Subitem;

class CommandeController extends Controller
{
    public function index()
    {
        $sales = Sales::all();
        $saleitems = SaleItem::all();
        $salesubitems = SaleSubitem::all();
        $items = Item::all();
        $itemssubitems = ItemSubItem::all();
        $itemtypes = ItemType::all();
        $subitems = Subitem::all();
        return view('Commandes.show_commandes',compact('sales', 'saleitems', 'salesubitems', 'items', 'itemssubitems', 'itemtypes', 'subitems'));
    }
}
