<?php

namespace Database\Seeders;

use App\Domain\Locations\Model\City;
use App\Domain\Locations\Model\Location;
use App\Domain\Users\Users\Model\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class LocationSeeder extends Seeder
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
            Location::create([
                'street' => $faker->name(),
                'building_number' => $faker->name(),
                'floor' => $faker->text(),
                'is_default' => $faker->boolean(),
                'user_id' => User::all()->random()->id,
                'city_id' => City::all()->random()->id,
            ]);
        }
    }
    
}
