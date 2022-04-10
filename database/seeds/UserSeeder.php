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
            $fakercv = [
                'uploads/doctors/cv/cv0.pdf',
                'uploads/doctors/cv/cv1.pdf',
                'uploads/doctors/cv/cv2.pdf',
                'uploads/doctors/cv/cv3.pdf',
                'uploads/doctors/cv/cv4.pdf',
                'uploads/doctors/cv/cv5.pdf',
                'uploads/doctors/cv/cv6.pdf',
                'uploads/doctors/cv/cv7.pdf',
                null,
            ];
            $fakerimg = [
                'uploads/doctors/photo/img0.jpg',
                'uploads/doctors/photo/img1.jpg',
                'uploads/doctors/photo/img2.jpg',
                'uploads/doctors/photo/img3.jpg',
                'uploads/doctors/photo/img4.jpg',
                'uploads/doctors/photo/img5.jpg',
                'uploads/doctors/photo/img6.jpg',
                'uploads/doctors/photo/img7.jpg',
                'uploads/doctors/photo/img8.jpg',
                'uploads/doctors/photo/img9.jpg',
                'uploads/doctors/photo/img10.jpg',
                null,
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
                'cv' => $fakercv[rand(0, count($fakercv) - 1)],
                'photo' => $fakerimg[rand(0, count($fakerimg) - 1)],
            ]
            );
        }
    }
}
