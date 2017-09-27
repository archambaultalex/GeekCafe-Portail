<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\ItemSize;
use Faker\Factory as Faker;

class ItemSizesTableSeeder extends Seeder {

  public function run()
  {
     $faker = Faker::create();

     $types = ['S', 'M', 'L', 'XL', '1 choix', '2 choix', '3 choix'];

     foreach (range(1, 7) as $index) {
       ItemSize::create([
          'name' => $types[$index - 1],
       ]);
     }
  }
}
