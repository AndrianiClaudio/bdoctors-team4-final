<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Model\Review;

class ReviewSeeder extends Seeder
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
            $review = new Review();

            $review->vote = 5;
            $review->user_id = $user->id;

            $review->save();

        }
    }
}
