<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 15; $i++) {
            // firstname, lastname inseriti prima per permettere slug
            $data = [
                'firstname' => $faker->firstName(),
                'lastname' => $faker->lastName(),
            ];

            User::create(
            [
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],

                'email' => $faker->email(),
                'slug' => User::createSlug($data['firstname'] . '-' . $data['lastname']),
                'password' => Hash::make('12345678'),
                'address' => $faker->address(),
                // NULLABLE
                'phone' => $faker->phoneNumber(),
                'photo' => $faker->imageUrl(200, 200, 'doctors', true),
                'cv' => $faker->imageUrl(200, 200),
            ]
            );
        }
    }
}
