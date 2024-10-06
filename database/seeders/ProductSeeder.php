<?php

namespace Database\Seeders;

use App\Domain\Categories\Model\Category;
use App\Domain\Products\Model\Product;
use App\Domain\Products\Model\ProductStatus;
use App\Domain\Sections\Model\Section;
use App\Domain\Stores\Model\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 20; $i++) {
            
            Product::insert([
            [   'name' => 'dsadsad',
                'an_name' => 'daskdbs',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQyrnUTvc5b8KNtET8Uljjvsji8OAKegu4PJA&usqp=CAU',
                'sku' =>  "115da",
                'bar_code' => '153135',
                'description' => "dadjsandjklasnjkdnsajdknsjandsjansaljk;nj;san anj ;najns",
                'an_description' => 'dsadlsad,ksamdklsamdklmskldamsdklsa',
                'is_active' => 1,
                'section_id' => 1,
                'category_id' => 1,
                'product_status_id' => 1,
                'store_id' => 1
            ]
        ]);
            Product::create([
                'name' => $faker->name(),
                'an_name' => $faker->name(),
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQyrnUTvc5b8KNtET8Uljjvsji8OAKegu4PJA&usqp=CAU',
                'sku' => $faker->realTextBetween(5,10),
                'bar_code' => $faker->numberBetween(1000000000001,9999999999999),
                'description' => $faker->realTextBetween(20),
                'an_description' => $faker->realTextBetween(20),
                'price' => $faker->numberBetween(100,1000),
                'is_active' => $faker->boolean(),
                'section_id' => Section::all()->random()->id,
                'category_id' => Category::all()->random()->id,
                'product_status_id' => ProductStatus::all()->random()->id,
                'store_id' => Store::all()->random()->id,

            ]);
        }
    }
}
