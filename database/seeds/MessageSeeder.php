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
        foreach (User::all() as $user) {
            $msg = new Message();

            $msg->firstname = $faker->firstName();
            $msg->lastname = $faker->lastName();
            $msg->email = $faker->email();
            $msg->content = 'Ciao bello';

            $msg->user_id = $user->id;

            $msg->save();
        }

    }
}
