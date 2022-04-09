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
        $this->createUser('Bronzo', 2.59, 24);
        $this->createUser('Argento', 5.99, 72);
        $this->createUser('Oro', 9.99, 144);
    }
}
