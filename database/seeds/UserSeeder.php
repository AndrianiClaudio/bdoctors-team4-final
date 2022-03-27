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
        // create admin user
        $newUser = new User();

        $newUser->firstname = 'admin';
        $newUser->lastname = 'admin';
        $newUser->email = 'admin@admin.it';
        $newUser->password = Hash::make('12345678');
        $newUser->address = 'via amministratore, 10';

        $newUser->phone = '+393331234567';
        $newUser->photo = $faker->imageUrl(200, 200, 'doctors', true);
        $newUser->cv = $faker->imageUrl(200, 200);
        $newUser->is_admin = true;
        $newUser->save();

        for ($i = 0; $i < 15; $i++) {
            $newUser = new User();

            $newUser->firstname = $faker->firstName();
            $newUser->lastname = $faker->lastName();
            $newUser->email = $faker->email();
            $newUser->password = Hash::make('12345678');
            $newUser->address = $faker->address();

            $newUser->phone = $faker->phoneNumber();
            $newUser->photo = $faker->imageUrl(200, 200, 'doctors', true);
            $newUser->cv = $faker->imageUrl(200, 200);

            $newUser->save();
        }
    }
}
