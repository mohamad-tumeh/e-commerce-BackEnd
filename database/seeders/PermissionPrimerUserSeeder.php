<?php

namespace Database\Seeders;

use App\Domain\Permissions\Model\Permission;
use App\Domain\Permissions\Model\PermissionsPrimerUser;
use App\Domain\Users\PrimerUsers\Model\PrimerUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionPrimerUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PermissionsPrimerUser::insert([

            //Admin
            ['permission_id' => 1,'primer_user_id' => 1],
            ['permission_id' => 2,'primer_user_id' => 1],
            ['permission_id' => 3,'primer_user_id' => 1],
            ['permission_id' => 4,'primer_user_id' => 1],
            ['permission_id' => 5,'primer_user_id' => 1],
            ['permission_id' => 6,'primer_user_id' => 1],
            ['permission_id' => 7,'primer_user_id' => 1],
            ['permission_id' => 8,'primer_user_id' => 1],
            ['permission_id' => 9,'primer_user_id' => 1],
            ['permission_id' => 10,'primer_user_id' => 1],
            ['permission_id' => 11,'primer_user_id' => 1],
            ['permission_id' => 12,'primer_user_id' => 1],
            ['permission_id' => 15,'primer_user_id' => 1],

            //Merchant
            ['permission_id' => 13,'primer_user_id' => 2],
            ['permission_id' => 14,'primer_user_id' => 2],
        ]);

        for ($i = 0; $i < 100; $i++) {
            PermissionsPrimerUser::create([
                'permission_id' => Permission::all()->random()->id,
                'primer_user_id' => PrimerUser::all()->random()->id
            ]);
        }
    }
}
