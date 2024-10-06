<?php

namespace Database\Seeders;

use App\Domain\Locations\Model\City;
use App\Domain\Stores\Model\Store;
use App\Domain\Stores\Model\StoresStatus;
use App\Domain\Stores\Model\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class StoreSeeder extends Seeder
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
            Store::create([
                'name' => $faker->name(),
                'an_name' => $faker->name(),
                'post_code' => $faker->name(),
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQyrnUTvc5b8KNtET8Uljjvsji8OAKegu4PJA&usqp=CAU',
                'cover' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQyrnUTvc5b8KNtET8Uljjvsji8OAKegu4PJA&usqp=CAU',
                'phone_number' => $faker->name(),
                'bank_account_number' => $faker->name(),
                'store_status_id' => StoresStatus::all()->random()->id,
                'city_id' => City::all()->random()->id,
                'tag_id' => Tag::all()->random()->id,

            ]);
        }
    }
}
