<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\SaleItem;

class SaleItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 100) as $index) {
            SaleItem::create([
                'item_id' => rand(1,13),
                'sales_id' => $index,
            ]);
        }
    }
}
