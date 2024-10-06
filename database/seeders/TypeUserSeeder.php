<?php

namespace Database\Seeders;

use App\Domain\Users\PrimerUsers\Model\TypeUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeUser::insert([
            ['type' => 'Admin'],
            ['type' => 'Merchant'],
        ]);
    }
}
