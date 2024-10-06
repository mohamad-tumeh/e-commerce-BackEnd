<?php

namespace Database\Seeders;

use App\Domain\Categories\Model\Category;
use App\Domain\Types\Model\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class TypeSeeder extends Seeder
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
            Type::create([
                'type' => $faker->name(),
                'an_type' => $faker->name(),
                'price' => 1,
                'category_id' => Category::all()->random()->id,
            ]);
        }
    }
}
