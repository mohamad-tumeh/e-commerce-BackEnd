<?php

namespace Database\Seeders;

use App\Domain\Products\Model\ProductStatus;
use App\Domain\Sections\Model\Section;
use App\Domain\Stores\Model\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class SectionSeeder extends Seeder
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
            Section::insert([
                [   'section' => 'Mohamad',
                    'an_section' => 'Ahmad',
                    'is_active' => 1,
                    'product_status_id' => 1,
                    'store_id' => 1
                ],
            ]);
            Section::create([
                'section' => $faker->name(),
                'an_section' => $faker->name(),
                'is_active' => $faker->boolean(),
                'product_status_id' => ProductStatus::all()->random()->id,
                'store_id' => Store::all()->random()->id,
            ]);
        }
    }
}
