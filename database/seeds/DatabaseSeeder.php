<?php

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
            UserSeeder::class ,
            SubscriptionSeeder::class ,
            SpecializationSeeder::class ,
            SpecializationUserSeeder::class ,
            ServiceSeeder::class ,
            ReviewSeeder::class ,
            MessageSeeder::class ,
            SubscriptionUserSeeder::class ,
        ]);
    }
}
