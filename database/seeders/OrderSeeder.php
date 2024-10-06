<?php

namespace Database\Seeders;

use App\Domain\Locations\Model\Location;
use App\Domain\Orders\Model\Order;
use App\Domain\Orders\Model\OrdersStatus;
use App\Domain\Users\Users\Model\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::insert([
            ['date' => '2023/02/02',
            'user_id' => 1,
            'location_id'=> 1,
            'order_status_id' => 1,
                'transaction_key' => 4455445
            ],
            ['date' => '2023/02/02',
            'user_id' => 1,
            'location_id'=> 1,
            'order_status_id' => 1,
                'transaction_key' => 4455445
            ],
            ['date' => '2023/02/02',
            'user_id' => 1,
            'location_id'=> 1,
            'order_status_id' => 2,
                'transaction_key' => 4455445
            ],
            ['date' => '2023/02/02',
            'user_id' => 1,
            'location_id'=> 1,
            'order_status_id' => 2,
                'transaction_key' => 4455445
            ],
            ['date' => '2023/02/02',
            'user_id' => 1,
            'location_id'=> 1,
            'order_status_id' => 3,
                'transaction_key' => 4455445
            ],
            ['date' => '2023/02/02',
            'user_id' => 1,
            'location_id'=> 1,
            'order_status_id' => 3,
                'transaction_key' => 4455445
            ],
            ['date' => '2023/02/02',
            'user_id' => 1,
            'location_id'=> 1,
            'order_status_id' => 4,
                'transaction_key' => 4455445
            ],
            ['date' => '2023/02/02',
            'user_id' => 1,
            'location_id'=> 1,
            'order_status_id' => 4,
                'transaction_key' => 4455445
            ],

        ]);
        $faker = Faker::create();
        for ($i = 0; $i < 28; $i++) {
            Order::create([
                'date' => $faker->dateTime(),
                'user_id' => User::all()->random()->id,
                'location_id' => Location::all()->random()->id,
                'order_status_id' => OrdersStatus::all()->random()->id,
                // 'promo_id' => $faker->text(),
                'transaction_key' => 488312055
            ]);
        }
    }
}
