<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Model\Specialization;

class SpecializationUserSeeder extends Seeder
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
            $sub = Specialization::inRandomOrder()->first();

            $user->specializations()->attach($sub->id);
        }
    }
}
