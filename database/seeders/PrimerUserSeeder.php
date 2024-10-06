<?php

namespace Database\Seeders;

use App\Domain\Locations\Model\City;
use App\Domain\Stores\Model\Store;
use App\Domain\Users\PrimerUsers\Model\PrimerUser;
use App\Domain\Users\PrimerUsers\Model\TypeUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Random;

class PrimerUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        PrimerUser::insert([
            [   'first_name' => 'Mohamad',
                'last_name' => 'Ahmad',
                'phone_number' => '054845456456',
                'password' =>  Hash::make('12345678'),
                'type_id' => '1',
                'store_id' => null
            ],
            [   'first_name' => 'Amr',
                'last_name' => 'Samer',
                'phone_number' => '098545165',
                'password' =>  Hash::make('12345678'),
                'type_id' => '2',
                'store_id' => 1
            ],
        ]);

        $faker = Faker::create();
        for ($i = 0; $i < 28; $i++) {
            PrimerUser::create([
                'first_name' => $faker->name(),
                'last_name' => $faker->name(),
                'phone_number' => $faker->phoneNumber(),
                'password' =>  Hash::make('12345678'),
                'type_id' => TypeUser::all()->random()->id,
                'store_id' => Store::all()->random()->id,
            ]);
        }
    }
}
