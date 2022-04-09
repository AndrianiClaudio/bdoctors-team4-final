<template>
    <div id="Overview" class="container-fluid">
        <div class="row">
            <div class="col text-center mt-5">
                <h1 class="text-white">Come lavoriamo?</h1>
            </div>
        </div>

        <div class="row">
            <div class="col d-flex justify-content-center text-center mt-5">
                <p class="w-50 text-white">
                    La nostra piattaforma si basa su tre semplici step per permetterti di ottenere una consulenza o una visita a tempo di record. Scegli tra pi&ugrave; di 10'000 dottori sparsi in tutta Italia: comodamente da casa tua e senza sottoporti a tempi di attesa epopeici.

                </p>
            </div>
        </div>

        <div class="row mt-5 pb-5">
            <div
                class="col d-flex flex-column justify-content-center align-items-center"
            >
                <div
                    class="mask-decoration d-flex flex-column justify-content-center align-items-center rounded-circle mb-5"
                >
                    <div class="mask-img a rounded-circle"></div>
                </div>
                <h2 class="text-center mb-2 text-white">Scegli il medico</h2>
                <p class="text-center text-white">
                    Cerca tra tutti i medici iscritti alla piattaforma selezionando in base alla specializzazione e alle recensioni degli altri utenti.
                </p>
            </div>
            <div
                class="col d-flex flex-column justify-content-center align-items-center"
            >
                <div
                    class="mask-decoration d-flex flex-column justify-content-center align-items-center rounded-circle mb-5"
                >
                    <div class="mask-img b rounded-circle"></div>
                </div>
                <h2 class="text-center mb-2 text-white">
                    Richiedi un appuntamento
                </h2>
                <p class="text-center text-white">
                    Una volta che sei soddisfatto del medico trovato mandagli un messaggio chiedendogli la disponibilit&agrave; per incontrarsi.
                </p>
            </div>
            <div
                class="col d-flex flex-column justify-content-center align-items-center"
            >
                <div
                    class="mask-decoration d-flex flex-column justify-content-center align-items-center rounded-circle mb-5"
                >
                    <div class="mask-img c rounded-circle"></div>
                </div>
                <h2 class="text-center mb-2 text-white">
                    Vai all'appuntamento
                </h2>
                <p class="text-center text-white">
                    A questo punto non resta che attendere la email di conferma da parte del medico e presentarti all'appuntamento.
                </p>
            </div>
            <!-- <div class="col d-flex flex-column justify-content-center align-items-center">
                <div class="mask-decoration d-flex flex-column justify-content-center align-items-center rounded-circle mb-5">
                    <div class="mask-img rounded-circle"> </div>
                </div>
                <h2 class="text-center mb-2">Appointment</h2>
                <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic exercitationem, rem tempora assumenda.</p>
            </div> -->
        </div>
    </div>
</template>

<script>
export default {
    name: "Overview",
};
</script>

<style lang="scss" scoped>
.container-fluid {
    // height: 650px;
    background-color: #37417e;

    .row {
        .col {
            .mask-decoration {
                border: 1px dashed rgba(255, 255, 255, 0.6);
                width: 250px;
                height: 250px;

                .mask-img {
                    // background-image: url("../../../storage/app/public/images/doctor1.jpg");
                    background-repeat: no-repeat;
                    background-size: cover;
                    background-position: center;
                    width: 200px;
                    height: 200px;
                }
                .mask-img.a {
                    background-image: url("../../../storage/app/public/images/medici-di-base-716668.large.webp");
                }
                .mask-img.b {
                    background-image: url("../../../storage/app/public/images/uomo-che-messaggia.jpg");
                }
                .mask-img.c {
                    background-image: url("../../../storage/app/public/images/pexels-photo-1919236-2.jpeg");
                }
            }
        }
    }
}
</style>
