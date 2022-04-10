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
            for ($i = 0; $i < rand(5, 15); $i++) {
                $arrayusers = [
                    'Userino',
                    'Scrittolo',
                    'MariaGrazia',
                    '_LimonOste',
                    '_AranciaGhiacciata',
                    'Mele',
                    '_MandarinoBruciato',
                    'GIANNI',
                    'Macedonia96',
                    'Mango_Spiaccicato',
                    'Melone_Di_Palombaro',
                    'Patate_e_Semola',
                    'Pomodori pelati',
                    '_FrafolaFrooper',
                    'BananaSbucciata',
                    'CachiNeri',
                    'Coccomento',
                    'PatatinaPelata',
                    'MGG',
                    null,
                ];
                $arraycontentspos = [
                    'Il dottore è molto simpatico forse anche andando a mancare appena sulla professionalità però rimane comunque competente in quello che fa.',
                    'Il dottore è super premuroso e attento, il suo studio è pulito e in ordine. Ottimo dottore, consigliato.',
                    'Educato e professionale',
                    'Location: Diesci',
                    'Sono entrato per una cosa che sembrava innocua e mi sono trovato ricoverato per due settimane, il personale è competente e gli ambienti puliti. Le porzioni del cibo un po\'scarse, ho provato a ordinare su DeliveBoo ma causa Covid non mi hanno fatto mangiare ciò che ho ordinato. Esperienza tutto ssommato positiva ma non lo consiglio.',
                    'Secondo me non è italiano però fa lo stesso.',
                    'Ho mandato un messaggio di Domenica per chiedere una visita e sono riuscita a prenotarla direttamente per il giorno dopo!',
                    'Ha due paia di occhiali talmente grandi che pensavo fosse uno scherzo, a parte quello non è male.',
                    'Dottore super simpatico e bravo con i bambini, ha fatto un indovinello a mio figlio e sono quattro giorni che ci ragioniamo su senza trovare la risposta.',
                    'Ma scnd voi è legale qst sito qui? Cmq il dottore è brv.',
                    'Mi ha offerto da bere, mi sta simpatico',
                    'Mamma non sono un fallito, guarda sono su un sitoooo!',
                    'Salve dottore, è qui che si scrivono i messaggi? Vorrei prenotare un\'appuntamento, quando è libero',


                ];
                $arraycontentsneg = [
                    'Guarda le stelle e saprai cosa ne penso...',
                    'Ma se faccio una recensione si legge il mio nome?',
                    'Toc toc, chi è? Non lo so ma di certo non questo dottore, mi ha già dato buca tre volte',
                    'Mi sono presentato nella clinica e il dottore è entrato insieme a me... In barella, era stato investito e quindi ho dovuto riprenotarmi. Scandaloso',
                    'Era un po\' in ritardo',
                    'Ma c\'è qualcuno che davvero legge le recensioni?',
                    'Ma il dottore può risalire a chi ha lasciato una recensione?',
                    'Mi ha fatto malissimo, mi ha slogato una spalla e sono entrato per tutt\'altro',
                    'Dice di essersi laureato ma secondo me non è vero',
                    'Mai visto uno stetoscopio così strano ahahah',
                    'Per niente professionale, sconsigliato',
                    'Pesante come il piombo',
                ];
                $review = new Review();
                $review->user_id = $user->id;
                $review->username = $arrayusers[rand(0, count($arrayusers) - 1)];
                $review->vote = rand(3, 5);
                if (rand(0, 2) === 0) {
                    if ($review->vote >= 4) {
                        $review->content = $arraycontentspos[rand(0, count($arraycontentspos) - 1)];

                    }
                    else if ($review->vote < 4) {
                        $review->vote = rand(1, 3);
                        $review->content = $arraycontentsneg[rand(0, count($arraycontentsneg) - 1)];
                    }
                }
                else {
                    $review->content = null;
                }

                $date = new Carbon(rand(1, $max) . "-" . $dt . "-2022 " . rand(0, 23) . ":" . rand(0, 59));
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
        $this::generate(4, intval(Carbon::now()->format("m")) - 1);

    }
}
