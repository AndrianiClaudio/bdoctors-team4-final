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
        $users = User::all();
        foreach ($users as $user) {
            $sub = Specialization::inRandomOrder()->limit(rand(1, 3))->get();
            $ids = [];
            foreach ($sub as $s) {
                $ids[] = $s->id;
            }
            $user->specializations()->attach($ids);

        }

    }
}
