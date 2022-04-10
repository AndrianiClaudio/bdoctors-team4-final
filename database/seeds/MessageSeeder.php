<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Model\Message;
use App\User;
use Carbon\Carbon;
use Faker\Factory as Fakers;


class MessageSeeder extends Seeder
{
    public static function generate($dt, Faker $faker, $max)
    {
        $faker = Fakers::create('it_IT');
        foreach (User::all() as $user) {
            for ($i = 0; $i < rand(3, 8); $i++) {
                $defaultmsgs = [
                    'Salve dottore, le volevo chiedere se fosse disponibile un giorno della prossima settimana per una visita.',
                    'Buongiorno, avrei bisogno di una visita il prima possibile dato che poi parto per le ferie, ha per caso tempo?',
                    'Salve, ho dei dolori lancinanti ma non ho idea di cosa possa provocarli, riesce a darmi uan controllata?',
                    'Dottore avrei bisogno di una visita di controllo per vedere se dopo l\'intervento è tutto a posto',
                    'Dottore mi fa male tutto, mi può dare una mano?',
                    'E DA DUE SETTIMANE CHE NON MI RISPONI, SE NON MI FISSI UN APPUNTAMENTO TI DENUNCIO, NON SCHERZO',
                    'Salve, chiedo per avere un\'informazione, è possibile pagare la visita tramite i ticket in ospedale?',
                    'Salve, mio figlio è medico, mi può fare uno sconto?',
                    'Sa quale è il colmo per dottore? Influenzare i propri pazienti ahahahah. Ci possiamo vedere domani che avrei bisogno di una visitina?'

                ];
                $msg = new Message();

                $msg->firstname = $faker->firstName();
                $msg->lastname = $faker->lastName();
                $msg->email = $faker->email();
                $msg->content = $defaultmsgs[rand(0, count($defaultmsgs) - 1)];

                $msg->user_id = $user->id;

                $date = new Carbon(rand(1, $max) . "-" . $dt . "-2022 " . rand(0, 23) . ":" . rand(0, 59));
                $msg->created_at = $date;
                $msg->updated_at = $date;
                $msg->save();
            }
        }

    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // GENNAIO
        $this::generate(1, $faker, 31);
        // FEBBRAIO
        $this::generate(2, $faker, 28);
        // MARZO
        $this::generate(3, $faker, 31);
        // APRILE

        $this::generate(4, $faker, intval(Carbon::now()->format("m")) - 1);

    // for ($i = 0; $i < rand(5, 15); $i++) {
    //     $msg = new Message();

    //     $msg->firstname = $faker->firstName();
    //     $msg->lastname = $faker->lastName();
    //     $msg->email = $faker->email();
    //     $msg->content = 'Ciao bello';

    //     $msg->user_id = $user->id;

    //     $msg->save();
    // }

    }
}
