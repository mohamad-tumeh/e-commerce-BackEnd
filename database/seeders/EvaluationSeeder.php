<?php

namespace Database\Seeders;

use App\Domain\Evaluations\Model\Evaluation;
use App\Domain\Stores\Model\Store;
use App\Domain\Users\Users\Model\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EvaluationSeeder extends Seeder
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
            Evaluation::create([
                'value' => $faker->numberBetween(1,5),
                'store_id' => Store::all()->random()->id,
                'user_id' => User::all()->random()->id,
            ]);
        }
    }
}
