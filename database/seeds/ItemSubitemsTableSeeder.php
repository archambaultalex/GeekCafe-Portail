<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\ItemSubitem;
use Faker\Factory as Faker;

class ItemSubitemsTableSeeder extends Seeder {

  public function run()
  {
     $faker = Faker::create();

     $free = ['Lait', 'Sucre', 'Crème'];
     $nonfree = ['Chocolat', 'Fraises', 'Framboises', 'Bleuets', 'Bananes', 'Chocolat au lait', 'Chocolat Blanc'];

     for ($i=0; $i < 8; $i++) {
       for ($y=0; $y < 4; $y++) {
         ItemSubitem::create([
            'item_id' => $i + 1,
            'subitem_id' => $y + 1,
         ]);
       }
     }
     for ($w=5; $w < 11; $w++) {
       ItemSubitem::create([
          'item_id' => 13,
          'subitem_id' => $w,
       ]);
     }
  }
}
