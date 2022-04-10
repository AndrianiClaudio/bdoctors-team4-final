<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Fakers;

class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // for test login_logout
        User::create([
            'firstname' => 'admin',
            'lastname' => 'admin',

            'email' => 'admin@admin.it',
            'slug' => User::createSlug('admin' . '-' . 'admin'),
            'password' => Hash::make('12345678'),
            'address' => 'via dell\'admin, 23',
            'phone' => '3339876543',
        ]);

        $faker = Fakers::create('it_IT');
        for ($i = 0; $i < 50; $i++) {
            // firstname, lastname inseriti prima per permettere slug
            $data = [
                'firstname' => $faker->firstName(),
                'lastname' => $faker->lastName(),

            ];
            $user_slug = User::createSlug($data['firstname'] . '-' . $data['lastname']);

            User::create(
            [
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'slug' => $user_slug,
                'email' => $user_slug . '@gmail.com',
                'password' => Hash::make('12345678'),
                'address' => $faker->address(),
                // NULLABLE
                'phone' => $faker->phoneNumber(),
            ]
            );
        }
    }
}
