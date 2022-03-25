<?php

use Illuminate\Database\Seeder;
use App\Model\Specialization;
use App\Model\Service;
use App\User;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specializations = Specialization::all();

        $service_names = [
            'Visita di chirurgia estetica. ...',
            'Manipolazioni vertebrali. ...',
            'Visita di chiropratica. ...',
            'Visita Oculistica medico legale. ...',
            'Visita Odontoiatrica Posturale. ...',
            'Videodermatoscopia del cuoio capelluto. ...',
            'Visita Gastroenterologica. ...',
            'Visita tricologica.',
        ];


        foreach ($specializations as $spec) {
            $newService = new Service();

            $newService->type = $service_names[rand(0, count($service_names) - 1)];
            // $newService->type;
            $newService->description = 'descrizione servizio';

            $user = User::inRandomOrder()->first();
            $spec = Specialization::inRandomOrder()->first();
            $newService->user_id = $user->id;
            $newService->specialization_id = $spec->id;

            $newService->save();
        }
    }
}
