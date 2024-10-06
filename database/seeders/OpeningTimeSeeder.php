<?php

namespace Database\Seeders;

use App\Domain\OpeningTimes\Model\OpeningTimes;
use App\Domain\Stores\Model\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class OpeningTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OpeningTimes::insert([
            ['day' => "Sunday",
            'from'=>  "2023-01-04 12:49:28",
            'to' => "2023-01-06 12:49:28",
            'state' => 1,
            'store_id' => 1,
            ]
        ]);
        $faker = Faker::create();
        for ($i = 0; $i < 28; $i++) {
            OpeningTimes::create([
                'day' => $faker->dayOfWeek(),
                'from' => $faker->dateTime(),
                'to' => $faker->dateTime(),
                'state' => $faker->numberBetween(0,1),
                'store_id' => Store::all()->random()->id,
            ]);
        }
    
    }
}
