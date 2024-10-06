<?php

namespace Database\Seeders;

use App\Domain\Locations\Model\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 28; $i++) {
            City::create([
                'postal' => $faker->numberBetween(11111,11999),
                'city' => $faker->city(),
            ]);
        }
    }
}
