<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            //Admin Permissions
            ['Permission' => 'Manage Store'],
            ['Permission' => 'Manage Merchant'],
            ['Permission' => 'Get Products Requests'],
            ['Permission' => 'Get Users'],
            ['Permission' => 'Get Merchants'],
            ['Permission' => 'Get Evaluations'],
            ['Permission' => 'Manage City'],
            ['Permission' => 'Manage Ads'],
            ['Permission' => 'Manage Notifications'],
            ['Permission' => 'Store Promo Management'],
            ['Permission' => 'Get Admins'],
            ['Permission' => 'show Statistics by admin'],

            //Merchants Permissions
            ['Permission' => 'Manage Product'],
            ['Permission' => 'show Statistics by merchant'],


            //Admin Permissons
            ['Permission' => 'Manage Admin'],

        ]);
    }
}
