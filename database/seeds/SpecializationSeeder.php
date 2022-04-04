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
            'Allergologia',
            'Cardiologia',
            'Dermatologia',
            'Ecografia',
            'Immunologia',
            'Medicina dello Sport',
            'Neurologia',
            'Oculistica',
            'Pediatria',
            'Psicologia',
            'Radiologia e Risonanza',
        ];

        foreach ($categories as $cat) {
            $newSpec = new Specialization();
            $newSpec->category = $cat;
            $newSpec->description = 'Lorem ipsum.';
            $newSpec->save();
        }
    }
}
