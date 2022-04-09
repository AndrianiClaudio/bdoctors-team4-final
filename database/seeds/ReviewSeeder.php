<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Model\Review;
use Carbon\Carbon;

class ReviewSeeder extends Seeder
{
    public static function generate($dt, $max)
    {
        foreach (User::all() as $user) {
            for ($i = 0; $i < rand(8, 30); $i++) {
                $review = new Review();
                $review->vote = rand(3, 5);
                $review->user_id = $user->id;
                $date = new Carbon(rand(1, $max) . "-" . $dt . "-2022 " . rand(0, 24) . ":" . rand(0, 59));
                $review->created_at = $date;
                $review->updated_at = $date;

                $review->save();

            }
        }

    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // GENNAIO
        $this::generate(1, 31);
        // FEBBRAIO
        $this::generate(2, 28);
        // MARZO
        $this::generate(3, 31);
        // APRILE
        $this::generate(4, 30);

    }
}
