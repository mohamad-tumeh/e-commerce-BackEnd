<?php

namespace Database\Seeders;

use App\Domain\OrderDetails\Model\OrderDetail;
use App\Domain\Orders\Model\Order;
use App\Domain\Products\Model\Product;
use App\Domain\Types\Model\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class OrderDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderDetail::insert([
            ['product_id' => 1,
            'order_id'=> 1,
            'price' => 454,
                
            ],
            ['product_id' => 1,
            'order_id'=> 2,
            'price' => 154
            ],
            ['product_id' => 1,
            'order_id'=> 3,
            'price' => 3,
            ],
            ['product_id' => 1,
            'order_id'=> 4,
            'price' => 456
            ],
            ['product_id' => 1,
            'order_id'=> 5,
            'price' => 455
            ],
            ['product_id' => 1,
            'order_id'=> 6,
            'price' => 151
            ],
            ['product_id' => 1,
            'order_id'=> 7,
            'price' => 154
            ],
            ['product_id' => 1,
            'order_id'=> 8,
            'price' => 564
            ],
   
        ]);
        $faker = Faker::create();
        for ($i = 0; $i < 28; $i++) {
            OrderDetail::create([
                'product_id' => Product::all()->random()->id,
                'order_id' => Order::all()->random()->id,
                'type_price' => 0,
                'type_id' => Type::all()->random()->id,
                'price' => 0,
            ]);
        }
    }
}
