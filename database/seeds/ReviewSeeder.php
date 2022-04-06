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
        foreach (User::all() as $user) {
            for ($i = 0; $i < rand(8, 30); $i++) {
                $review = new Review();
                $review->vote = rand(3, 5);
                $review->user_id = $user->id;
                $review->save();
            }
        // $review = new Review();
        // $review->vote = 5;
        // $review->user_id = $user->id;
        // $review->save();
        }
    }
}
