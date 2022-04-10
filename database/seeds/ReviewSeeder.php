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
                $arraycontent = [
                    'Il dottore è super premuroso e attento, il suo studio è pulito e in ordine. Ottimo dottore, consigliato.',
                    'Il dottore è molto simpatico forse anche andando a mancare appena sulla professionalità però rimane comunque competente in quello che fa.',
                    'Educato e professionale',
                    'Location: Diesci',
                    'Sono entrato per una cosa che sembrava innocua e mi sono trovato ricoverato per due settimane, il personale è competente e gli ambienti puliti. Le porzioni del cibo un po\'scarse, ho provato a ordinare su DeliveBoo ma causa Covid non mi hanno fatto mangiare ciò che ho ordinato. Esperienza tutto ssommato positiva ma non lo consiglio.',
                    null,
                    'Secondo me non è italiano però fa lo stesso.',
                    'Ho mandato un messaggio di Domenica per chiedere una visita e sono riuscita a prenotarla direttamente per il giorno dopo!',
                    'Ha due paia di occhiali talmente grandi che pensavo fosse uno scherzo, a parte quello non è male.',
                    'Guarda le stelle e saprai cosa ne penso...',
                    'Dottore super simpatico e bravo con i bambini, ha fatto un indovinello a mio figlio e sono quattro giorni che ci ragioniamo su senza trovare la risposta.',
                    'Ma se faccio una recensione si legge il mio nome?',
                    'Toc toc, chi è? Non lo so ma di certo non questo dottore, mi ha già dato buca tre volte', 
                    'Ma scnd voi è legale qst sito qui? Cmq il dottore è brv.',
                    'Mi sono presentato nella clinica e il dottore è entrato insieme a me... In barella, era stato investito e quindi ho dovuto riprenotarmi',
                    'Era un po\' in ritardo',
                    'Ma c\'è qualcuno che davvero legge le recensioni?',
                    'Mi ha offerto da bere, mi sta simpatico',
                    'Ma il dottore può risalire a chi ha lasciato una recensione?',
                    'Mamma non sono un fallito, guarda sono su un sitoooo!',
                    'Mi ha fatto malissimo, mi ha slogato una spalla e sono entrato per tutt\'altro',
                    'Dice di essersi laureato ma secondo me non è vero',
                    'Salve dottore, è qui che si scrivono i messaggi? Vorrei prenotare un\'appuntamento, quando è libero',
                    'Mai visto uno stetoscopio così strano ahahah',
                    null,
                ];
                $review = new Review();
                $review->user_id = $user->id;
                $review->username = $arrayusers[rand(0, 19)];
                $review->vote = rand(3, 5);
                if (rand(0, 2) === 0) {
                    $review->content = $arraycontent[rand(0, 24)];
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
        $this::generate(4, 30);

    }
}
