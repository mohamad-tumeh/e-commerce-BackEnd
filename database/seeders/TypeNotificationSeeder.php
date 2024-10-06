<?php

namespace Database\Seeders;

use App\Domain\Locations\Model\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class TypeNotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_messages')->insert([
            ['type' => 'Elanat'],
            ['type' => 'New Orders'],
            ['type' => 'Order Status']
        ]);
    }
}
