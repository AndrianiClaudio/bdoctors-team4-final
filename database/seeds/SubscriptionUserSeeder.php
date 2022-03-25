<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Model\Subscription;

class SubscriptionUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            $user = User::inRandomOrder()->first();
            $sub = Subscription::inRandomOrder()->first();

            $user->subscriptions()->attach($sub->id, [
                'expires_date' => '2022-03-23 15:28:35'
            ]);

        }
    }
}
