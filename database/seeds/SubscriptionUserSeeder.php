<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Model\Subscription;
use App\Model\Specialization;

class SubscriptionUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::inRandomOrder()->limit(rand(10,
            count(User::all()) - 10))->get();
        foreach ($users as $user) {
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
