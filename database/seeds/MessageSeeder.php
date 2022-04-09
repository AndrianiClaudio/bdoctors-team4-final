<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Model\Message;
use App\User;
use Carbon\Carbon;


class MessageSeeder extends Seeder
{
    public static function generate($dt, Faker $faker, $max)
    {
        foreach (User::all() as $user) {
            for ($i = 0; $i < rand(5, 15); $i++) {
                $msg = new Message();

                $msg->firstname = $faker->firstName();
                $msg->lastname = $faker->lastName();
                $msg->email = $faker->email();
                $msg->content = 'Ciao bello';

                $msg->user_id = $user->id;

                $date = new Carbon(rand(1, $max) . "-" . $dt . "-2022 " . rand(0, 23) . ":" . rand(0, 59));
                $msg->created_at = $date;
                $msg->updated_at = $date;
                $msg->save();
            }
        }

    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // GENNAIO
        $this::generate(1, $faker, 31);
        // FEBBRAIO
        $this::generate(2, $faker, 28);
        // MARZO
        $this::generate(3, $faker, 31);
        // APRILE
        $this::generate(4, $faker, 30);

    // for ($i = 0; $i < rand(5, 15); $i++) {
    //     $msg = new Message();

    //     $msg->firstname = $faker->firstName();
    //     $msg->lastname = $faker->lastName();
    //     $msg->email = $faker->email();
    //     $msg->content = 'Ciao bello';

    //     $msg->user_id = $user->id;

    //     $msg->save();
    // }

    }
}
