<?php

use Illuminate\Database\Seeder;
use App\Model\Subscription;

class SubscriptionSeeder extends Seeder
{
    public function createUser(string $name, float $price, int $duration)
    {
        $sub = new Subscription();
        $sub->name = $name;
        $sub->price = $price;
        $sub->duration = $duration;
        $sub->save();
    }


    public function run()
    {
        $this->createUser('bronze', 2.59, 24);
        $this->createUser('silver', 5.99, 72);
        $this->createUser('gold', 9.99, 144);
    }
}
