<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\User;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

  public function run()
  {
     $faker = Faker::create();
     $genders = ['male', 'female', 'other'];

     foreach (range(1, 5) as $index) {
       User::create([
          'email' => "account".$index."@geekcafe.com",
          'password' => Hash::make("geekcafe"),
          'gender' => $genders[rand(0, sizeof($genders) - 1)],
          'phone' => $faker->phoneNumber(),
          'birth_date' => $faker->date(),
          'first_name' => $faker->firstName(),
          'last_name' => $faker->lastName(),
           'is_admin' => 1,
       ]);
     }

      User::create([
          'email' => "archambaultalexandre@outlook.com",
          'password' => Hash::make("Allo123"),
          'gender' => 'male',
          'phone' => '+1514-994-2358',
          'birth_date' => '1997-12-08',
          'first_name' => 'Alexandre',
          'last_name' => 'Archambault',
      ]);
  }
}
