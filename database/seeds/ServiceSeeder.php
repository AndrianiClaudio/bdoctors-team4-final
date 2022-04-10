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
        // $specializations = Specialization::all();

        $service_names = [
            'Visita specialistica di controllo',
            'Consulto medico in presenza',
            'Consulto medico in videochiamata',
            'Richiesta ricetta medica',
            'Operazione chirurgica',
            'Manipolazioni vertebrali',
            'Consulto protesi',
            'Controllo post-intervento',
            'Verifica pre-intervento',
            'Chiarimenti',
            'Visita specialistica',
        ];

        foreach (User::all() as $user) {
            $newService = new Service();

            $newService->type = $service_names[rand(0, count($service_names) - 1)];
            // $newService->description = 'descrizione servizio';

            $newService->user_id = $user->id;
            $newService->specialization_id = Specialization::inRandomOrder()->first()->id;

            $newService->save();
        }
    }
}
