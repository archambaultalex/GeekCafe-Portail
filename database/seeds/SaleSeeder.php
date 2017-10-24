<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Sales;
use Faker\Factory as Faker;
use Carbon\Carbon;

class SaleSeeder extends Seeder {

    public function run()
    {

        $reduction = ['5.00', '10%', '2.50', '15%', '1.23', '100%', '2.00'];

        $faker = Faker::create();
        foreach (range(1, 100) as $index) {
            Sales::create([
                'user_id' => $index,
                'is_active' => rand(0,1),
                'created_at' => Carbon::now()->subDay(rand(1, 14))->toDateTimeString(),
            ]);
        }
    }
}