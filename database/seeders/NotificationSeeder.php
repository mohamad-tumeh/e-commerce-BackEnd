<?php

namespace Database\Seeders;

use App\Domain\Locations\Model\City;
use App\Domain\Notifications\Model\Notification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Notification::insert([
            ['title' => "Hello",
            'message'=>  "added new elan",
            'type_id' => 1
            ],
            ['title' => "Hello",
            'message'=> "add new order",
            'type_id' => 2
            ],
            ['title' => "Hello",
            'message'=> 'change your order status',
            'type_id' => 3
            ],
   
        ]);
    }
}
