<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Model\Message;
use App\User;


class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 4; $i++) {
            $msg = new Message();
            // 'firstname', 'lastname', 'email', 'content', 'user_id '
            $msg->firstname = $faker->firstName();
            $msg->lastname = $faker->lastName();
            $msg->email = $faker->email();
            $msg->content = 'Ciao bello';

            $user = User::inRandomOrder()->first();
            $msg->user_id = $user->id;

            $msg->save();
        }
    }
}
