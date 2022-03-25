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
        $this->call(UserSeeder::class);
        $this->call(SubscriptionSeeder::class);
        $this->call(SpecializationSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(MessageSeeder::class);
        $this->call(SubscriptionUserSeeder::class);
        $this->call(SpecializationUserSeeder::class);
    }
}
