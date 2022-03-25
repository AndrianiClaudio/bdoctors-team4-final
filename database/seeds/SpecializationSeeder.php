<?php

use Illuminate\Database\Seeder;
use App\Model\Specialization;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Neurology',
            'Ophthalmology',
            'Nuclear Magnetic',
            'X-Ray',
            'Surgical',
            'Cardiology',
            'Dental Clinic',
        ];

        foreach ($categories as $cat) {
            $newSpec = new Specialization();
            $newSpec->category = $cat;
            $newSpec->description = 'Lorem ipsum.';
            $newSpec->save();
        }
    }
}
