<?php

namespace Database\Seeders;

use App\Domain\Users\Users\Model\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        User::insert([
            'first_name' => $faker->name(),
            'last_name' => $faker->name(),
            'phone_number' => '+963987456982',
            'password' =>  Hash::make('12345678'),
            'gender' => $faker->name(),
            'birthday' => now(),
            'verify' => 1,
            'code' => 123456
        ]);
        for ($i = 0; $i < 28; $i++) {
            User::create([
                'first_name' => $faker->name(),
                'last_name' => $faker->name(),
                'phone_number' => $faker->phoneNumber(),
                'password' =>  Hash::make('12345678'),
                'gender' => $faker->name(),
                'birthday' => now(),
            ]);
        }
    }
}
