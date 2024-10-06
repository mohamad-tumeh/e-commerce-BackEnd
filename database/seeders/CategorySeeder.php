<?php

namespace Database\Seeders;

use App\Domain\Categories\Model\Category;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
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
            Category::create([
                'category' => $faker->name(),
                'an_category' => $faker->name(),
            ]);
        }
    }
}
