<?php

use Illuminate\Database\Seeder;
use App\Model\Specialization;
use PHPUnit\Framework\Constraint\Count;

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

        $descriptions = [
            "L'Allergologia è la branca della medicina che si occupa della diagnosi, del trattamento e della prevenzione delle allergie, vale a dire condizioni di rigetto da parte dell'organismo, ad alcune sostanze, dette allergeni, alle quali esso reagisce in modo esagerato,  nonché delle patologie immunitarie caratterizzate da eccessiva sensibilità verso particolari sostanze e delle possibili malattie ad esse collegate. L'Allergologia ha interessi e conoscenze in comune con il campo dell'Immunologia Clinica e della Medicina Interna.",
            "La Cardiologia è la specializzazione della medicina che tratta lo studio, la diagnosi e la cura delle malattie cardiovascolari congenite o acquisite.  È una disciplina medica che negli ultimi anni grazie anche ai progressi scientifici e allo sviluppo tecnologico della strumentazione è molto progredita e al suo interno si sono sviluppate delle sotto-specialità come l'emodinamica e l'elettrofisiologia. Il progressivo miglioramento diagnostico e terapeutico delle Cardiopatie congenite ha determinato, nei passati decenni, la sopravvivenza di molti bambini che divenuti adulti hanno prodotto la nascita di una nuova sotto-specialità della Cardiologia che è quella indirizzata al Cardiopatici Congeniti Adulti. Oltre la cura di malattie cardiovascolari, di scompensi e di anomalie, la Cardiologia si occupa della prevenzione cardiovascolare e della riabilitazione del paziente sottoposto ad intervento cardiochirurgico.",
            "La Dermatologia è la specializzazione della medicina che si occupa dello studio della pelle e dei tessuti connessi quali peli, capelli, unghie.  La pelle è la parte più visibile del corpo e ne rappresenta l'organo più esteso. Le patologie dermatologiche in genere riguardano esclusivamente la pelle, tuttavia diverse malattie sono la manifestazione di un disturbo più interno, che può interessare diversi tessuti o organi interni. Per questo motivo la dermatologia si interseca anche con altre discipline mediche quali la reumatologia (diversi disturbi reumatici possono avere manifestazioni a livello della cute), l'immunologia, la neurologia, l'infettivologia e l'endocrinologia.",
            "L'Ecografia o ecotomografia è utilizzata normalmente in ambito internistico, chirurgico e  radiologico. E' una tecnica diagnostica che attraverso l'applicazione degli ultrasuoni, visualizza graficamente gli organi interni, la loro forma e le loro eventuali alterazioni. La frequenza di utilizzo degli ultrasuoni (compresa tra 2 e 20 MHz) è scelta in funzione del tipo di indagine che si deve fare, considerando che  frequenze maggiori hanno un maggiore potere risolutivo dell'immagine ma penetrano meno in profondità nell'organismo del paziente.",
            "L'Immunologia è una specializzazione della medicina che si occupa di individuare e curare patologie che comportano un'alterazione del sistema immunitario.  L’immunologia ricerca soluzioni terapeutiche  per patologie come l’artrite reumatoide, le immunodeficienze, le allergie, le malattie infiammatorie intestinali (colite ulcerosa, morbo di Crohn) e la psoriasi. È una disciplina estremamente complessa in cui si sovrappongono conoscenze appartenenti anche ad altre specializzazioni come la Biologia Molecolare, la Genetica, la Fisiologia, la Farmacologia e la Patologia Clinica.",
            "La Medicina dello Sport è una branca della medicina che si occupa dello sport e delle sue patologie a carattere prevalentemente preventivo.  Studia le reazioni dell'atleta durante l'attività sportiva, dal punto di vista, antropologico, fisiologico e clinico e ne controlla il corretto equilibrio sanitario durante gli allenamenti e le gare. Tra i suoi compiti principali vi è quello di accertare la condizione fisica di un soggetto giovane che inizia lo sport, fornendo le indicazioni più corrette per la pratica dello stesso indirizzandolo verso lo sport più adatto alle sue doti costituzionali. Altro aspetto importante sono i consigli e le prescrizioni inerenti l'alimentazione e i mezzi di prevenzione e cura delle patologie ad insorgenza giovanile (eccesso ponderale, scoliosi, piede piatto o cavo ecc.). Aiuta a prevenire o a curare adeguatamente malattie derivate da una pratica sportiva compiuta in modo scorretto. Vigila sulle possibilità di frode nel mondo dello sport, come il doping.",
            "La Neurologia è quella branca della medicina che studia le patologie che riguardano il Sistema Nervoso Centrale (cervello, cervelletto, tronco encefalico e midollo spinale), le patologie connesse al Sistema Periferico Somatico e cioè che interessano radici e  gangli spinali, plessi e tronchi nervosi, ed infine patologie collegate al Sistema Nervoso Periferico Autonomo che riguardano, quindi, gangli simpatici e parasimpatici, plessi extraviscerali ed intraviscerali. Fino a qualche decennio fa, lo studio delle patologie del Sistema Nervoso includeva in un unico filone sia le malattie della mente che quelle a carattere, per così dire organico, e la disciplina era allora denominata Neuropsichiatria. Successivamente tali due campi di studio vennero articolati clinicamente e didatticamente, in neurologia e psichiatria. Diverse sono le patologie del sistema nervoso, sia per zona anatomica di comparsa che per processo di insorgenza e sviluppo, oggetto di studio della neurologia; tra le altre si ricordano le malattie infiammatorie, circolatorie, quelle degenerative primarie, quelle dello sviluppo e quelle rare e congenite. Altre patologie di interesse sono l'epilessia, i disturbi del sonno, l'emicrania e le demenze.",
            "L'Oculistica (denominata anche Oftalmologia), disciplina medica molto antica, è la specializzazione della medicina che studia la prevenzione, la diagnosi e i metodi di cura delle malattie dell'occhio, nonché della correzione dei vizi refrattivi.  L'apparato visivo, oltre che dal bulbo oculare, è costituito anche da altri organi posti nella zona anteriore della testa e protetti dalle cavità orbitarie. Nell'oculistica si sono diffuse negli ultimi decenni tecniche innovative, sia sotto il profilo dell'analisi delle patologie che delle metodologie di cura che hanno consentito di compiere progressi importanti. L'oculistica in genere distingue tra malattie dell'occhio e dell'apparato visivo e difetti della vista (cosiddette malattie della rifrazione o malattie dell'ottica).",
            "La Pediatria è una specializzazione della medicina che tratta dello sviluppo psico-fisico dei bambini e  della diagnosi e cura delle malattie infantili.  La neonatologia è un ramo della pediatria che studia i neonati entro il primo mese di vita. L'attuale cooperazione tra pediatria e ostetricia consente ormai di prevenire le malformazioni del feto e di curare le malattie fin dai primi giorni di vita.",
            "La Psicologia è la scienza che si occupa dello studio dei processi psichici, mentali, e cognitivi.  Lo psicologo ha come oggetto del suo studio principalmente il paziente nella sua individualità, nei suoi processi cognitivi e intrapsichici. Aree di intervento dello Psicologo possono essere la psicoanalisi o la psicoterapia, quest'ultima può essere condotta da laureati in Psicologia che hanno conseguito una specializzazione specifica Lo Psicologo si avvale dell'uso di strumenti conoscitivi e di intervento per la prevenzione, la diagnosi, le attività di abilitazione-riabilitazione e di sostegno in ambito psicologico rivolte a persone singole piuttosto che coppie o gruppi. La psicologia si differenzia dalla psichiatria, che è una disciplina medica centrata prevalentemente sulla neurofisiologia del cervello, focalizzata sull'intervento di tipo farmacologico",
            "La Radiologia diagnostica è la specializzazione della medicina che studia il modo di fornire immagini vere, ricostruite, o virtuali dell'interno del corpo umano, con l'obiettivo di fornire informazioni utili alla diagnosi e alla successiva terapia medica.  Per tal motivo si è soliti parlare anche di radiologia diagnostica. La radiografia convenzionale è la radiografia analogica (i Raggi X), la prima tecnica di imaging inventata e attualmente ancora utilizzata che si basa sull'utilizzo dei raggi X e sull'effetto di frenamento dovuto all'interazione tra materia e radiazione. La tomografia computerizzata è un metodo di diagnostica per immagini che utilizza radiazioni ionizzanti (raggi X) e consente di riprodurre sezioni (tomografia) corporee del paziente con elaborazioni tridimensionali. Per la produzione delle immagini è necessario l'intervento di un elaboratore di dati (computerizzata). E' nota con il nome di tomografia assiale computerizzata o TAC. Di recente invenzione è la Risonanza Magnetica Nucleare (RMN) che è una tecnica di indagine basata sui principi fisici che utilizzano la misurazione della precessione dello spin di protoni soggetti ad un campo magnetico. E' una tecnica d'indagine molto efficace che, a differenza delle altre due, non presenta rischi di radioattività e quindi di pericolo per l'organismo.",
        ];
        
        foreach ($categories as $index=>$cat) {
            $newSpec = new Specialization();
            $newSpec->category = $cat;
            $newSpec->description = $descriptions[$index];
            $newSpec->save();
        }
    }
}

