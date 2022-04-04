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

            // SET TIMEZONE & NOW + SUB DURATION
            date_default_timezone_set('Europe/Rome');
            $now = new DateTime();
            $now_clone = clone $now;
            $now_clone->add(new DateInterval('PT' . $sub->duration . 'H'));
            $user->subscriptions()->attach($sub->id, [
                'expires_date' => $now_clone,
            ]);

        }
    }
}
