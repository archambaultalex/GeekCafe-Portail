<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\SaleSubitem;

class SaleSubitemSeeder extends Seeder
{

    public function run()
    {
        foreach (range(1, 100) as $index) {
            SaleSubitem::create([
                'sale_item_id' => $index,
                'subitem_id' => rand(1, 10),
            ]);
        }
    }
}
