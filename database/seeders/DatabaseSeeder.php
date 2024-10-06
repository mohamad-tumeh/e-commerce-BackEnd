<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LanguageSeeder::class,
            UserSeeder::class,
            OrderStatusSeeder::class,
            PermissionSeeder::class,
            ProductStatusSeeder::class,
            StoreStatusSeeder::class,
            TagSeeder::class,
            CitySeeder::class,
            LocationSeeder::class,
            CategorySeeder::class,
            TypeSeeder::class,
            StoreSeeder::class,
            SectionSeeder::class,
            TypeUserSeeder::class,
            PrimerUserSeeder::class,
            EvaluationSeeder::class,
            OpeningTimeSeeder::class,
            ProductSeeder::class,
            OrderSeeder::class,
            OrderDetailsSeeder::class,
            PermissionPrimerUserSeeder::class,
            TypeNotificationSeeder::class,
            NotificationSeeder::class

        ]);

    }
}
